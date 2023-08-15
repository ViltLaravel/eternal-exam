<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'last_name',
        'first_name',
        'middle_name',
        'sex',
        'birthday',
        'address',
        'civil_status',
        'contact_number',
        'product',
        'price'
    ];

    public function allCustomer() {
        $all = Auth::user();
        return $all;
    }
       public function createCustomer($user, $data) {
        $user = Auth::user();
        $update = $this->where('id', $user->id)->first();
        $update->update($data);
        return $update;
    }

    public function printCredentials($user) {
        $user = Auth::user();
        $print = $this->where('id', $user->id)->first();
        return $print;
    }

    public function allCustomerAdmin() {
        $currentUser_id = auth()->user()->id;
        $staff_ids = DB::table('users')->where('role', 'Staff')->pluck('id');
        $admin = $this->whereNotIn('id', [$currentUser_id])->whereNotIn('id', $staff_ids)->get();

        return $admin;
    }

    public function allCustomerStaff() {
        $currentUser_id = auth()->user()->id;
        $admin_ids = DB::table('users')->where('role', 'Admin')->pluck('id');
        $staff = $this->whereNotIn('id', [$currentUser_id])->whereNotIn('id', $admin_ids)->get();
    
        return $staff;
    }

    public function deleteCustomerAdmin($id) {
        $customer = $this->find($id);
    
        if ($customer) {
            $customer->delete();
            return true;
        }
    
        return false;
    }
    
    

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
    ];
}
