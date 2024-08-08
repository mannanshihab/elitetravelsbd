<?php

namespace App\Livewire;

use App\Models\Agent;
use App\Models\AgentStatement;
use App\Models\Vendor;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Customer;
use App\Models\VendorStatement;

class EditInvoice extends Component
{
        // just for viewing purpose
        public $agents;
        public $customers;
        public $vendors;
        public $countries;
        public $html;
        public $profit;
    
    
        // working purpose
        public $invoice_id;
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
        public $agent_amount;
        public $costing;
    
    
        public function EditInvoice()
        {
    
            if ($this->work_type == 'visa') {
                $data = $this->validate([
                    'work_type' => 'required',
                    'customer_id' => 'required',
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
                    'going' => 'required',
                    'status' => 'required',
                    'agent_id' => 'required',
                    'our_amount' => 'required',
                    'received_amount' => 'required',
                    'agent_amount' => 'required',
                ]);
            }
    
            if($this->status == 'delivered'){
                $agentexst = AgentStatement::where('source', $this->invoice_id)->first();
                if($agentexst){
                    AgentStatement::where('source', $this->invoice_id)->update(['amount' => $this->agent_amount, 'pay_via' => "Added from invoice"]);
                }else{
                    AgentStatement::create([
                        'agent_id' => $this->agent_id,
                        'source' => $this->invoice_id,
                        'amount' => $this->agent_amount,
                        'pay_via' => "Added from invoice"
                    ]);
                }

                $vendorexst = VendorStatement::where('source', $this->invoice_id)->first();
                if($vendorexst){
                    VendorStatement::where('source', $this->invoice_id)->update(['amount' => $this->costing, 'pay_via' => "Added from invoice"]);
                }else{
                    VendorStatement::create([
                        'vendor_id' => $this->vendor_id,
                        'source' => $this->invoice_id,
                        'amount' => $this->costing,
                        'pay_via' => "Added from invoice",
                    ]);
                }

            }

            if ($this->vendor_id && $this->costing) {
                $data['vendor_id'] = $this->vendor_id;
                $data['costing'] = $this->costing;
            }

            Invoice::where('invoice', $this->invoice_id)->update($data);
    
            $this->dispatch('swal', [
                'title' => 'Invoice updated successfully.',
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
    
    
    
            return view('livewire.edit-invoice');
        }
    
        public function mount($invoice_id)
        {
            $invoice = Invoice::with('customer')->find($invoice_id);
            $this->invoice_id = $invoice->invoice;
            $this->work_type = $invoice->work_type;
            $this->customer_id = $invoice->customer_id;
            $this->date_of_birth = $invoice->date_of_birth;
            $this->passport_no = $invoice->passport_no;
            $this->member_id = $invoice->member_id;
            $this->going = $invoice->going;
            $this->status = $invoice->status;
            $this->agent_id = $invoice->agent_id;
            $this->our_amount = $invoice->our_amount;
            $this->received_amount = $invoice->received_amount;
            $this->agent_amount = $invoice->agent_amount;
            $this->costing = $invoice->costing;
            $this->profit = $invoice->profit;
            $this->vendor_id = $invoice->vendor_id;
            $this->appointment_date = $invoice->appointment_date;
            $this->web_file_no = $invoice->web_file_no;
            $this->token_no = $invoice->token_no;
            $this->rcv_date = $invoice->rcv_date;
            $this->delivery_date = $invoice->delivery_date;
            $this->date_of_birth = $invoice->customer->date_of_birth;
            $this->passport_no = $invoice->customer->passport_no;
            $this->member_id = $invoice->customer->member_id;


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
