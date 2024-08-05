<?php

namespace App\Livewire;

use App\Models\Agent;
use App\Models\Vendor;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;

#[Title('Add Invoice')]
class AddInvoice extends Component
{

    // just for viewing purpose
    public $agents;
    public $customers;
    public $vendors;
    public $countries;
    public $html;
    public $profit;


    // working purpose
    public $work_type;
    public $customer_id;
    public $agent_id;
    public $vendor_id;
    public $date_of_birth;
    public $going;
    public $passport_no;
    public $web_file_no;
    public $token_no;
    public $ticket_no;
    public $pnr_no;
    public $member_id;
    public $appointment_date;
    public $rcv_date;
    public $delivery_date;
    public $status;
    public $our_amount;
    public $received_amount;
    public $costing;
    public $agent_amount;


    public function addInvoice()
    {

        if ($this->work_type == 'visa') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'going' => 'required',
                'appointment_date' => 'required',
                'web_file_no' => 'required',
                'token_no' => 'required',
                'rcv_date' => 'required',
                'delivery_date' => 'required',
                'status' => 'required',
                'agent_id' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        } elseif ($this->work_type == 'air ticket') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'going' => 'required',
                'ticket_no' => 'required',
                'pnr_no' => 'required',
                'status' => 'required',
                'agent_id' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        } elseif ($this->work_type == 'tour package') {
            $data = $this->validate([
                'work_type' => 'required',
                'customer_id' => 'required',
                'date_of_birth' => 'required',
                'passport_no' => 'required',
                'member_id' => 'required',
                'going' => 'required',
                'status' => 'required',
                'agent_id' => 'required',
                'our_amount' => 'required',
                'received_amount' => 'required',
                'agent_amount' => 'required',
            ]);
        }

        unset($data['date_of_birth']);
        unset($data['passport_no']);
        unset($data['member_id']);

        if ($this->vendor_id && $this->costing) {
            $data['vendor_id'] = $this->vendor_id;
            $data['costing'] = $this->costing;
        }

        $data['user_id'] = auth()->user()->id;
        $data['invoice'] = rand(100000, 999999);

        Invoice::create($data);

        $this->dispatch('swal', [
            'title' => 'Invoice added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }


    public function getCustomerDetails()
    {
        if (empty($this->customer_id)) {
            $this->date_of_birth = '';
            $this->passport_no = '';
            $this->member_id = '';
        } else {
            $customer = Customer::find($this->customer_id);
            $this->date_of_birth = $customer->date_of_birth;
            $this->passport_no = $customer->passport;
            $this->member_id = $customer->member_id;
        }
    }


    public function render()
    {
        $customers = Customer::get();
        if ($this->work_type == 'visa') {
            $this->html = view('livewire.invoice-of-visa', ['customers' => $customers, 'countries' => $this->countries])->render();
            $this->dispatch('picker', [
                'status' => 'yes',
            ]);
        } elseif ($this->work_type == 'air ticket') {
            $this->html = view('livewire.invoice-of-air-ticket', ['customers' => $customers, 'countries' => $this->countries])->render();
            $this->dispatch('picker', [
                'status' => 'no',
            ]);
        } elseif ($this->work_type == 'tour package') {
            $this->html = view('livewire.invoice-of-tour', ['customers' => $customers])->render();
            $this->dispatch('picker', [
                'status' => 'yes',
            ]);
        }


        if ($this->our_amount && $this->received_amount) {
            if ($this->our_amount == $this->received_amount) {
                $this->agent_amount = 0;
            } elseif ($this->our_amount < $this->received_amount) {
                $this->agent_amount = str_replace('-', '', $this->our_amount - $this->received_amount);
            } elseif ($this->our_amount > $this->received_amount) {
                $this->agent_amount = $this->received_amount - $this->our_amount;
            }
        }


        if ($this->status == 'delivered' && $this->our_amount && $this->received_amount && $this->costing) {
            $this->profit = $this->our_amount - $this->costing;
        }



        return view('livewire.add-invoice');
    }

    public function mount()
    {
        $this->vendors = Vendor::get();
        $this->customers = Customer::get();
        $this->agents = Agent::get();
        $this->countries = [
            'Afghanistan',
            'Albania',
            'Algeria',
            'Andorra',
            'Angola',
            'Antigua & Deps',
            'Argentina',
            'Armenia',
            'Australia',
            'Austria',
            'Azerbaijan',
            'Bahamas',
            'Bahrain',
            'Bangladesh',
            'Barbados',
            'Belarus',
            'Belgium',
            'Belize',
            'Benin',
            'Bhutan',
            'Bolivia',
            'Bosnia Herzegovina',
            'Botswana',
            'Brazil',
            'Brunei',
            'Bulgaria',
            'Burkina',
            'Burundi',
            'Cambodia',
            'Cameroon',
            'Canada',
            'Cape Verde',
            'Central African Rep',
            'Chad',
            'Chile',
            'China',
            'Colombia',
            'Comoros',
            'Congo',
            'Congo {Democratic Rep}',
            'Costa Rica',
            'Croatia',
            'Cuba',
            'Cyprus',
            'Czech Republic',
            'Denmark',
            'Djibouti',
            'Dominica',
            'Dominican Republic',
            'East Timor',
            'Ecuador',
            'Egypt',
            'El Salvador',
            'Equatorial Guinea',
            'Eritrea',
            'Estonia',
            'Ethiopia',
            'Fiji',
            'Finland',
            'France',
            'Gabon',
            'Gambia',
            'Georgia',
            'Germany',
            'Ghana',
            'Greece',
            'Grenada',
            'Guatemala',
            'Guinea',
            'Guinea-Bissau',
            'Guyana',
            'Haiti',
            'Honduras',
            'Hungary',
            'Iceland',
            'India',
            'Indonesia',
            'Iran',
            'Iraq',
            'Ireland {Republic}',
            'Israel',
            'Italy',
            'Ivory Coast',
            'Jamaica',
            'Japan',
            'Jordan',
            'Kazakhstan',
            'Kenya',
            'Kiribati',
            'Korea North',
            'Korea South',
            'Kosovo',
            'Kuwait',
            'Kyrgyzstan',
            'Laos',
            'Latvia',
            'Lebanon',
            'Lesotho',
            'Liberia',
            'Libya',
            'Liechtenstein',
            'Lithuania',
            'Luxembourg',
            'Macedonia',
            'Madagascar',
            'Malawi',
            'Malaysia',
            'Maldives',
            'Mali',
            'Malta',
            'Marshall Islands',
            'Mauritania',
            'Mauritius',
            'Mexico',
            'Micronesia',
            'Moldova',
            'Monaco',
            'Mongolia',
            'Montenegro',
            'Morocco',
            'Mozambique',
            'Myanmar, {Burma}',
            'Namibia',
            'Nauru',
            'Nepal',
            'Netherlands',
            'New Zealand',
            'Nicaragua',
            'Niger',
            'Nigeria',
            'Norway',
            'Oman',
            'Pakistan',
            'Palau',
            'Panama',
            'Papua New Guinea',
            'Paraguay',
            'Peru',
            'Philippines',
            'Poland',
            'Portugal',
            'Qatar',
            'Romania',
            'Russian Federation',
            'Rwanda',
            'St Kitts & Nevis',
            'St Lucia',
            'Saint Vincent & the Grenadines',
            'Samoa',
            'San Marino',
            'Sao Tome & Principe',
            'Saudi Arabia',
            'Senegal',
            'Serbia',
            'Seychelles',
            'Sierra Leone',
            'Singapore',
            'Slovakia',
            'Slovenia',
            'Solomon Islands',
            'Somalia',
            'South Africa',
            'South Sudan',
            'Spain',
            'Sri Lanka',
            'Sudan',
            'Suriname',
            'Swaziland',
            'Sweden',
            'Switzerland',
            'Syria',
            'Taiwan',
            'Tajikistan',
            'Tanzania',
            'Thailand',
            'Togo',
            'Tonga',
            'Trinidad & Tobago',
            'Tunisia',
            'Turkey',
            'Turkmenistan',
            'Tuvalu',
            'Uganda',
            'Ukraine',
            'United Arab Emirates',
            'United Kingdom',
            'United States',
            'Uruguay',
            'Uzbekistan',
            'Vanuatu',
            'Vatican City',
            'Venezuela',
            'Vietnam',
            'Yemen',
            'Zambia',
            'Zimbabwe',
        ];
    }
}
