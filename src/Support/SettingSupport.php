<?php


namespace  LTUpdate\Extension\Support;



use LTUpdate\Extension\Entities\Setting;

/**
 * Class SettingSupport
 * @author wanghouting
 * @package LTUpdate\Extension\Support;
 */
class SettingSupport
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new Setting();
    }

    /**
     * Getting the setting
     * @param  string $name
     * @param  string   $default
     * @return mixed
     */
    public function get($name, $default = null)
    {


        $setting = $this->repository->where('name',$name)->first();
        return $setting !== null ?  $setting->plainValue : $default;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param  string $name
     * @return bool
     */
    public function has($name)
    {
        $default = microtime(true);

        return $this->get($name,  $default) !== $default;
    }

    /**
     * Set a given configuration value.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return \Modules\Setting\Entities\Setting
     */
    public function set($key, $value)
    {
        return $this->repository->create([
            'name' => $key,
            'plainValue' => $value,
        ]);
    }






}
