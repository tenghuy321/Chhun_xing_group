<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\AboutList;
use App\Models\Residence;
use App\Models\ProjectList;
use App\Models\ProjectPage;
use Illuminate\Http\Request;
use App\Models\SpecialProject;
use App\Models\ProjectExperince;

class RealEstateProjectController extends Controller
{
    public function index()
    {
        $data['realEstate'] = ProjectPage::first();
        $data['project'] = Project::orderBy('order')->get();
        $data['special_title'] = ProjectList::find(2);
        $data['special_project'] = SpecialProject::get();;
        $data['residence_image'] = Residence::orderBy('order')->get();
        $data['realEstate_title'] = ProjectList::find(1);
        $data['residentialProjects'] = ProjectList::find(3);

        $data['firm_id'] = AboutList::find(1);
        $data['msf_id'] = AboutList::find(2);
        $data['team_id'] = AboutList::find(3);
        $data['our_people_id'] = AboutList::find(9);
        $data['mvc_id'] = AboutList::find([4, 5, 6]);
        $data['brc_id'] = AboutList::find(7);
        $data['why_us_id'] = AboutList::find(8);

        $data['contact'] = Contact::first();

        return view('real-estate-project', $data);
    }
}
