<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Person;
use App\Models\NaturalPerson;
use App\Models\CompanyPerson;
use App\Models\Phone;
use Illuminate\Support\Facades\Http;

class PersonService
{
    public static function create($data)
    {
        $data['type_person'] = isset($data['natural_person']) ? 'F' : 'J';

        $person = Person::create($data);

        if(isset($data['natural_person'])) {
            $personFisica = new NaturalPerson($data['natural_person']);
            $personFisica->person()->associate($person)->save();
        }
        else if(isset($data['company_person'])) {
            $personJuridica = new CompanyPerson($data['company_person']);
            $personJuridica->person()->associate($person)->save();
        }

        $dadosaddress = isset($data['address']) ? $data['address'] : [];

        $address = new address($dadosaddress);
        $address->person()->associate($person)->save();

        if(isset($data['telefone'])){
            foreach ($data['telefone'] as $telefoneData) {
                $telefone = new Phone($telefoneData);
                $telefone->person()->associate($person)->save();
            }
        }

        return $person;
    }

    public static function update($data, Person $person)
    {
        $person->update($data);

        if(isset($data['natural_person'])) {
            $person->natural_person->update($data['natural_person']);
        }
        else if(isset($data['company_person'])) {
            $person->company_person->update($data['company_person']);
        }

        return $person;
    }

    public static function deletePerson(Person $person)
    {
        $person->delete();
    }

}
