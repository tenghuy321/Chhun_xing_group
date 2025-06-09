<?php

namespace App\Http\Controllers;

use App\Models\Msg;
use App\Models\WhyUs;
use App\Models\Vision;
use App\Models\Contact;
use App\Models\History;
use App\Models\Mission;
use App\Models\OurTeam;
use App\Models\AboutList;
use App\Models\AboutPage;
use App\Models\CoreValue;
use App\Models\Certificate;
use App\Models\OurPeople;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data['aboutpage'] = AboutPage::first();
        $data['history'] = History::get();
        $data['msg_title'] = AboutList::find(2);
        $data['msg'] = Msg::first();
        $data['ourTeamTitle'] = AboutList::find(3);
        $data['our_team'] = OurTeam::orderBy('order')->get();
        $data['visionTitle'] = AboutList::find(4);
        $data['vision'] = Vision::first();
        $data['missionTitle'] = AboutList::find(5);
        $data['mission'] = Mission::first();
        $data['core_values_title'] = AboutList::find(6);
        $data['core_values'] = CoreValue::orderBy('order')->get();
        $data['certificate_title'] = AboutList::find(7);
        $data['certificate'] = Certificate::orderBy('order')->get();
        $data['why_us_title'] = AboutList::find(8);
        $data['why_us'] = WhyUs::get();

        $data['our_people_title'] = AboutList::find(9);
        $data['our_people_line1'] = OurPeople::whereBetween('order', [1, 5])->orderBy('order')->get();
        $data['our_people_line2'] = OurPeople::whereBetween('order', [6, 9])->orderBy('order')->get();
        $data['our_people_line3'] = OurPeople::whereBetween('order', [10, 14])->orderBy('order')->get();


        $data['firm_id'] = AboutList::find(1);
        $data['msf_id'] = AboutList::find(2);
        $data['team_id'] = AboutList::find(3);
        $data['our_people_id'] = AboutList::find(9);
        $data['mvc_id'] = AboutList::find([4, 5, 6]);
        $data['brc_id'] = AboutList::find(7);
        $data['why_us_id'] = AboutList::find(8);

        $data['contact'] = Contact::first();

        return view('about-us', $data);
    }
}
