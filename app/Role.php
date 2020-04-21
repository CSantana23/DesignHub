<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @param String $role
     * @return $this
     */
    public function addRole(String $role)
    {
        $roles = $this->getRoles();
        $roles[] = $role;
        $roles[] = array_unique($roles);
        $this->setRoles($roles);
        return $this;
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function setRoles(array $roles)
    {
        $this->setAttribute('roles', $roles);
        return $this;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasRoles($roles)
    {
        $currentRoles = $this->getRoles();
        foreach ($roles as $role){
            if(!in_array($role, $currentRoles)){
                return false;
            }
        }
    }

    /**
     * @return array|mixed
     */
    public function getRoles()
    {
        $roles = $this->getAttribute('roles');
        if(is_null($roles)){
            $roles=[];
        }
        return $roles;
    }
}
