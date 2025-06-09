<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\AboutList;
use App\Models\Residence;
use App\Models\ProjectPage;
use Illuminate\Http\Request;

class ResidenceDetailController extends Controller
{
    public function show($id)
    {
        $data['residence'] = Residence::findOrFail($id);
        $data['realEstate'] = ProjectPage::first();
        $data['firm_id'] = AboutList::find(1);
        $data['msf_id'] = AboutList::find(2);
        $data['team_id'] = AboutList::find(3);
        $data['our_people_id'] = AboutList::find(9);
        $data['mvc_id'] = AboutList::find([4, 5, 6]);
        $data['brc_id'] = AboutList::find(7);
        $data['why_us_id'] = AboutList::find(8);

        $data['contact'] = Contact::first();

        return view('show', $data);
    }
}
