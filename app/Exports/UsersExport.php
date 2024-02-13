<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class UsersExport implements FromCollection, WithHeadings,WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        Log::info('map() function called');
        // $hdob = Carbon::createFromTimestamp($user->hdob)->toDateTimeString();
        // $hdob = Carbon::createFromTimestamp($user->hdob)->format('Y-m-d');
       
        $hdob = gmdate("Y-m-d", intval($user->hdob));

        // dd($hdob);
        Log::info('HDOB: ' . $user->hdob);
        // $wdob = Carbon::createFromTimestamp($user->wdob)->toDateTimeString();
        // $wdob = Carbon::createFromTimestamp($user->wdob)->format('Y-m-d');
        $wdob = gmdate("Y-m-d", intval($user->wdob));

        $c1dob = gmdate("Y-m-d", intval($user->c1dob));
        $c2dob = gmdate("Y-m-d", intval($user->c2dob));
        $c3dob = gmdate("Y-m-d", intval($user->c3dob));
        
        return [

            $user->id,
            $user->md5_id,
            $user->full_name,
            $user->user_name,
            $user->user_email,
            $user->user_level,
            $user->pwd,
            $user->address,
            $user->postadd,
            $user->zipcode,
            $user->country,
            $user->area,
            $user->arearoad,
            $user->tel,
            $user->fax,
            $user->website,
            $user->date,
            $user->users_ip,
            $user->approved,
            $user->activation_code,
            $user->banned,
            $user->ckey,
            $user->ctime,
            $user->sel_org,
            $user->sel_org2,
            $user->sel_org3,
            $user->surname,
            $user->firstname,
            $user->lastname,
            $user->city,
            $user->plotnumber,
            $user->landline,
            $user->landline2,
            $user->mobile,
            $user->mobile2,
            $user->gender,
            $user->blood,
            $hdob,
            $user->wsurname,
            $user->wfirstname,
            $user->wlastname,
            $user->wblood2,
            $wdob,
            $user->w_email,
            $user->wmobile2,
            $user->wgender2,
            $user->c1surname,
            $user->c1firstname,
            $user->c1lastname,
            $user->c1blood,
            $c1dob,
            $user->c1gender,
            $user->c2surname,
            $user->c2firstname,
            $user->c2lastname,
            $user->c2blood,
            $c2dob,
            $user->c2gender,
            $user->c3surname,
            $user->c3firstname,
            $user->c3lastname,
            $user->c3blood,
            $c3dob,
            $user->c3gender,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'md5_id',
            'full_name',
            'user_name',
            'user_email',
            'user_level',
            'pwd',
            'address',
            'postadd',
            'zipcode',
            'country',
            'area',
            'arearoad',
            'tel',
            'fax',
            'website',
            'date',
            'users_ip',
            'approved',
            'activation_code',
            'banned',
            'ckey',
            'ctime',
            'sel_org',
            'sel_org2',
            'sel_org3',
            'surname',
            'firstname',
            'lastname',
            'city',
            'plotnumber',
            'landline',
            'landline2',
            'mobile',
            'mobile2',
            'gender',
            'blood',
            'hdob',
            'wsurname',
            'wfirstname',
            'wlastname',
            'wblood2',
            'wdob',
            'w_email',
            'wmobile2',
            'wgender2',
            'c1surname',
            'c1firstname',
            'c1lastname',
            'c1blood',
            'c1dob',
            'c1gender',
            'c2surname',
            'c2firstname',
            'c2lastname',
            'c2blood',
            'c2dob',
            'c2gender',
            'c3surname',
            'c3firstname',
            'c3lastname',
            'c3blood',
            'c3dob',
            'c3gender',
        ];
    }
}
