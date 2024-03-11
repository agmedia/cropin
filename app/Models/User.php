<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\UserRegistered;
use App\Models\Roles\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\HasApiTokens;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    /**
     * @var Request
     */
    protected $request;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }


    /**
     * Validate new category Request.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function validateRequest(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255']
        ]);

        $this->request = $request;

        return $this;
    }


    /**
     * Validate new category Request.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function validateFrontRequest(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']

        ]);

        $this->request = $request;

        return $this;
    }


    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }


    /**
     * @param Request|null $request
     *
     * @return $this
     */
    public function setCheckoutRegisteredUser(Request $request = null): User
    {
        if ($request) {
            $this->setRequest($request);
        }

        $request->merge(['fname' => $request->input('firstname')]);
        $request->merge(['lname' => $request->input('lastname')]);
        $request->merge(['username' => $request->input('firstname') . ' ' . $request->input('lastname')]);
        $request->merge(['status' => 'on']);

        return $this;
    }


    /**
     * @return mixed
     */
    public function make()
    {
        if ( ! empty($this->request->password)) {
            $this->request->validate([
                'password' => ['required', 'string', 'confirmed']
            ]);
        }

        $exist = User::query()->where('email', $this->request->email)->first();

        if ($exist) {
            return $exist;
        }

        $public_user = User::create([
            'name'     => $this->request->username,
            'email'    => $this->request->email,
            'password' => Hash::make($this->request->password),
        ]);

        Bouncer::assign('customer')->to($public_user);

        UserDetail::create([
            'user_id'    => $public_user->id,
            'fname'      => $this->request->fname,
            'lname'      => $this->request->lname,
            'address'    => $this->request->address ?: '',
            'zip'        => $this->request->zip ?: '',
            'city'       => $this->request->city ?: '',
            'state'      => $this->request->state ?: '',
            'phone'      => $this->request->phone,
            //'company'      => $this->request->company,
            //'oib'      => $this->request->oib,
            'affiliate'  => '',
            'avatar'     => 'media/avatars/avatar1.jpg',
            'bio'        => '',
            'social'     => '',
            'role'       => 'customer',
            'status'     => (isset($this->request->status) and $this->request->status == 'on') ? 1 : 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Mail::to($public_user)->send(new UserRegistered($public_user));

        return $public_user;
    }


    /**
     * @param Category $category
     *
     * @return false
     */
    public function edit()
    {
        $this->request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email'    => [
                'required',
                'string',
                'email',
                'max:255'
            ]
        ]);

        if (isset($this->request->username)) {
            $this->update([
                'name'       => $this->request->username,
                'email'      => $this->request->email,
                'password'   => Hash::make($this->request->password),
                'updated_at' => Carbon::now()
            ]);
        }

        if ($this->shouldChangePassword()) {
            $this->request->validate([
                'password' => ['required', 'string', Password::default(), 'confirmed']
            ]);

            $this->update([
                'password'   => Hash::make($this->request->password),
                'updated_at' => Carbon::now()
            ]);
        }

        if ($this->id) {
            if ( ! isset($this->request->role)) {
                $this->request->role = 'customer';
            }

            if (Role::checkIfChanged($this->id, $this->request->role)) {
                Role::change($this->id, $this->request->role);

                $this->update([
                    'role'   => $this->request->role,
                    'updated_at' => Carbon::now()
                ]);
            }

            UserDetail::where('user_id', $this->id)->update([
                'user_id'    => $this->id,
                'fname'      => $this->request->fname,
                'lname'      => $this->request->lname,
                'address'    => $this->request->address,
                'zip'        => $this->request->zip,
                'city'       => $this->request->city,
                'state'      => $this->request->state,
                'phone'      => $this->request->phone,
                //'company'    => $this->request->company,
                //'oib'        => $this->request->oib,
                'affiliate'  => '',
                'avatar'     => 'media/avatars/avatar1.jpg',
                'bio'        => '',
                'social'     => '',
                'status'     => (isset($this->request->status) and $this->request->status == 'on') ? 1 : 0,
                'updated_at' => Carbon::now()
            ]);

            return $this->find($this->id);
        }

        return false;
    }


    /**
     * @return bool
     */
    private function shouldChangePassword(): bool
    {
        if (isset($this->request->old_password) && ! empty($this->request->old_password) &&
            isset($this->request->password) && ! empty($this->request->password) &&
            isset($this->request->password_confirmation) && ! empty($this->request->password_confirmation)
        ) {
            if ($this->request->password == $this->request->password_confirmation) {
                return true;
            }
        }

        return false;
    }
}
