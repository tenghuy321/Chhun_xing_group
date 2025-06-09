<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Models\AboutList;
use App\Models\Residence;
use App\Models\ProjectList;
use App\Models\ProjectPage;
use Illuminate\Http\Request;
use App\Models\ResidenceList;
use App\Models\ResidencePage;
use App\Models\ProjectExperince;

class ResidenceProjectController extends Controller
{
    public function index()
    {
        $data['residence'] = ResidencePage::first();
        $data['projectExperince_title'] = ResidenceList::find(3);
        $data['projectExperince'] = ProjectExperince::orderBy('order')->get();
        $data['service_title'] = ResidenceList::find(2);
        $data['service'] = Service::get();

        $data['firm_id'] = AboutList::find(1);
        $data['msf_id'] = AboutList::find(2);
        $data['team_id'] = AboutList::find(3);
        $data['our_people_id'] = AboutList::find(9);
        $data['mvc_id'] = AboutList::find([4, 5, 6]);
        $data['brc_id'] = AboutList::find(7);
        $data['why_us_id'] = AboutList::find(8);

        $data['contact'] = Contact::first();

        return view('residence-project', $data);
    }
}
