<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contruct extends Model
{

    use softDeletes;

    protected $table = 'contructs';
    protected $primaryKey = 'cont_id';
    protected $guarded = ['cont_id'];
    protected $dates = ['date_from','date_to'];
    protected function rules(){

      $num3 = [
        'required',
        'regex:/^((\d{1,3}(,\d{3})*)|(\d+))$/u'
      ];

      return [
        'name'=>'required|max:255',
        'date_from' => 'required|date',
        'date_to' => 'required|date|after:date_from',
        'customer' => 'max:64',
        'cust_company' =>'max:64',
        'cust_person' => 'max:64',
        'price' => $num3,
        'budget_remain' => '',
        'state' => '',
        'exec_budget' => $num3,
        'price_taxed' => $num3,
        'claim_remain' => $num3,
        'deposit_remain' => $num3,
        //'documents' => '',
        //'comment' => '',
        'sales_person' => 'max:64',
        'const_admin' => 'max:64',
        'update_by' => 'required|numeric'
      ];
    }


    public function messages()
    {
        return [
            'date' => ':attributeに日付を入力してください',
            'after'  => ':attributeに開始日以降の日付を入力してください',
            'level.between'  => ':attributeは:minから:maxまでやねん',

        ];
    }

    public function attributes()
    {
        return [
          //'cont_id' => '',
          'name' => '工事名',
          'date_from' =>  '工期',
          'date_to' =>  '工期',
          'customer' =>  '施主',
          'cust_company' =>  '発注元',
          'cust_person' =>  '発注元担当者',
          'price' =>  '受注額',
          'budget_remain' =>  '予算残',
          'state' =>  '',
          'exec_budget' =>  '実行予算',
          'price_taxed' =>  '受注額（税込',
          'claim_remain' =>  '請求残',
          'deposit_remain' =>  '入金残',
          //'documents' =>  '',
          //'comment' =>  '',
          'sales_person' => '営業担当',
          //'const_admin' =>  '',
          //'update_by' =>  '',
        ];
    }
}
