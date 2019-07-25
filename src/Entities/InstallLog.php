<?php


namespace LTTools\Extension\Entities;


use Illuminate\Database\Eloquent\Model;

class InstallLog extends Model
{
    protected $fillable = ['menu_id','created_at','updated_at'];
    protected $table = 'lttools_install_log';
}