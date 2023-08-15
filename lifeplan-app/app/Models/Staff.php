<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'email',
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
        'price',
        'payment'
    ];

    public function editCustomerStaff($id) {
        return $this->select('*')->where('id', $id)->first();
    } 

    public function updateCustomerStaff($id, $data) {
        $update = $this->where('id', $id)->update($data);
    
        return $update;
    }

    public function printCustomerStaff($id) {
        return $this->select('*')->where('id', $id)->get();
    } 
    

    
}
