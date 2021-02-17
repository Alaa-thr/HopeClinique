<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Specialite;
use DB;

class uniqueService implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $idService;
    public function __construct($idService)
    {
        $this->idService = 7;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $specialites = Specialite::All();
        foreach($specialites as $specialite) {
            if($this->idService == 0){
                if( $specialite->nom == $value){
                    return false;
                }
            }else{
                if( $specialite->nom == $value && $specialite->id != $this->idService){
                    return false;
                }
            }
            
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The service name already existe';
    }
}
