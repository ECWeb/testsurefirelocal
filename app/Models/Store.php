<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    public $table;
    public $data;
    public $error;
    public $message;

    public function __construct() {
        $this->table = (Object) [
            'top' => 'top_stores',
            'best' => 'best_stores',
            'stores' => 'stores',
            'coupons' => 'coupons',
            'properties' => 'properties',
            'categories' => 'categories'
        ];
    }

    public function C($data) {
        try {
            //code

            $this->error = false;
        } catch (Throwable $th) {
            $this->error = true;
            $this->message = $th;
        }
        echo $this->message;
        return $this;
    }

    public function R($type, $target = null, $value = null) {
        $query['top'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url, 
            c.id as c_id, c.title, c.currency, c.exclusive, c.expire_date, c.comment_count, c.discount, c.cash_back, c.coupon_code as code, 
            c.coupon_type as type, c.coupon_image as image, d.foreign_key_right as go
            FROM ".$this->table->top." as a
            left join ".$this->table->stores." as b on a.store_id = b.id
            left join ".$this->table->coupons." as c on a.coupon_id = c.id
            left join ".$this->table->properties."  as d on c.id = d.foreign_key_left
            ORDER BY a.order ASC";

        $query['best'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url, 
            c.id as c_id, c.title, c.currency, c.exclusive, c.expire_date, c.comment_count, c.discount, c.cash_back, c.coupon_code as code, 
            c.coupon_type as type, c.coupon_image as image, d.foreign_key_right as go
            FROM ".$this->table->best." as a
            left join ".$this->table->stores." as b on a.store_id = b.id
            left join ".$this->table->coupons." as c on a.coupon_id = c.id
            left join ".$this->table->properties."  as d on c.id = d.foreign_key_left
            ORDER BY a.order ASC limit 4";

        $query['latestcoupon'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url, 
            a.id as c_id, a.title, a.currency, a.exclusive, a.expire_date, a.comment_count, a.discount, a.cash_back, a.coupon_code as code, 
            a.coupon_type as type, a.coupon_image as image, d.foreign_key_right as go
            FROM ".$this->table->coupons." as a
            left join ".$this->table->stores." as b on a.store_id = b.id
            left join ".$this->table->properties."  as d on a.id = d.foreign_key_left
            where a.coupon_type = 'Coupon Code' or a.coupon_type = 'Deal Type'
            ORDER BY a.created_at DESC limit 10";

        $query['lateststore'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url
            FROM ".$this->table->stores." as b
            where logo != ''
            ORDER BY b.created_at DESC limit 12";

        $query['storedetail'] = "SELECT *
            FROM ".$this->table->stores." 
            where ".$target." = '".$value."'";

        $query['storecoupons'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url, 
            a.id as c_id, a.title, a.currency, a.exclusive, a.expire_date, a.comment_count, a.discount, a.cash_back, a.coupon_code as code, 
            a.coupon_type as type, a.coupon_image as image, d.foreign_key_right as go, a.description
            FROM ".$this->table->coupons." as a
            left join ".$this->table->stores." as b on a.store_id = b.id
            left join ".$this->table->properties."  as d on a.id = d.foreign_key_left
            where (a.coupon_type = 'Coupon Code' or a.coupon_type = 'Deal Type'  or a.coupon_type = 'Great Offer') 
                and b.alias = '".$value."' and a.currency != '' and a.discount != ''
            ORDER BY a.created_at DESC";

        $query['storefaqtips'] = "SELECT b.id, b.name, b.logo, b.alias, b.store_url, b.affiliate_url, 
            a.id as c_id, a.title, a.currency, a.exclusive, a.expire_date, a.comment_count, a.discount, a.cash_back, a.coupon_code as code, 
            a.coupon_type as type, a.coupon_image as image, d.foreign_key_right as go, a.description
            FROM ".$this->table->coupons." as a
            left join ".$this->table->stores." as b on a.store_id = b.id
            left join ".$this->table->properties."  as d on a.id = d.foreign_key_left
            where (a.coupon_type = 'FAQ' or a.coupon_type = 'Saving Tips') and b.alias = '".$value."'
            ORDER BY a.created_at DESC";

        $query['storerandom4fromcategory'] = "SELECT *
            FROM ".$this->table->stores." 
            where status = 'published'
            ORDER BY RANDOM()
            LIMIT 4";

        $query['search'] = "SELECT *
            FROM ".$this->table->stores." 
            ".$value." and status = 'published'";

        $query['allcategories'] = "SELECT *
            FROM ".$this->table->categories." 
            where status = 'published'
            order by alias asc";

        $query['getcategory'] = "SELECT *
            FROM ".$this->table->categories." 
            where status = 'published' and alias = '".$value."'";

        $query['storesbycategory'] = "SELECT b.id, 
            b.name, b.logo, b.alias, b.store_url, b.affiliate_url
            FROM ".$this->table->stores." as b
            where logo != '' and categories_id like '%".$value."%'
            ORDER BY b.created_at DESC limit 60";

        try {
            $this->data = DB::select($query[$type]);

            $this->error = false;
        } catch (Throwable $th) {
            $this->error = true;
            $this->message = $th;
        }

        return $this;
    }

    public function U($id, $data) {
        try {
            //code
        
            $this->error = false;
        } catch (Throwable $th) {
            $this->error = true;
            $this->message = $th;
        }

        return $this;
    }

    public function D($id) {
        try {
            //code

            $this->error = false;
        } catch (Throwable $th) {
            $this->error = true;
            $this->message = $th;
        }
    }

    public function get () {
        return $this->data;
    }

    public function first() {
        return $this->data[0];
    }
}
