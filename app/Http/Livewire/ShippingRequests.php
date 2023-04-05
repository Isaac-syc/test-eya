<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShippingRequest;

class ShippingRequests extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fullname, $email, $phone_number, $zip_code_origin, $zip_code_destination, $long, $width, $high, $weight, $description;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.shipping-requests.view', [
            'shippingRequests' => ShippingRequest::latest()
						->orWhere('fullname', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('phone_number', 'LIKE', $keyWord)
						->orWhere('zip_code_origin', 'LIKE', $keyWord)
						->orWhere('zip_code_destination', 'LIKE', $keyWord)
						->orWhere('long', 'LIKE', $keyWord)
						->orWhere('width', 'LIKE', $keyWord)
						->orWhere('high', 'LIKE', $keyWord)
						->orWhere('weight', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->paginate(15),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->fullname = null;
		$this->email = null;
		$this->phone_number = null;
		$this->zip_code_origin = null;
		$this->zip_code_destination = null;
		$this->long = null;
		$this->width = null;
		$this->high = null;
		$this->weight = null;
		$this->description = null;
    }

    public function store()
    {
        $this->validate([
		'fullname' => 'required',
		'email' => 'required',
		'phone_number' => 'required',
		'zip_code_origin' => 'required',
		'zip_code_destination' => 'required',
		'long' => 'required',
		'width' => 'required',
		'high' => 'required',
		'weight' => 'required',
		'description' => 'required',
        ]);

        ShippingRequest::create([
			'fullname' => $this-> fullname,
			'email' => $this-> email,
			'phone_number' => $this-> phone_number,
			'zip_code_origin' => $this-> zip_code_origin,
			'zip_code_destination' => $this-> zip_code_destination,
			'long' => $this-> long,
			'width' => $this-> width,
			'high' => $this-> high,
			'weight' => $this-> weight,
			'description' => $this-> description
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'ShippingRequest Successfully created.');
    }

    public function edit($id)
    {
        $record = ShippingRequest::findOrFail($id);
        $this->selected_id = $id;
		$this->fullname = $record-> fullname;
		$this->email = $record-> email;
		$this->phone_number = $record-> phone_number;
		$this->zip_code_origin = $record-> zip_code_origin;
		$this->zip_code_destination = $record-> zip_code_destination;
		$this->long = $record-> long;
		$this->width = $record-> width;
		$this->high = $record-> high;
		$this->weight = $record-> weight;
		$this->description = $record-> description;
    }

    public function update()
    {
        $this->validate([
		'fullname' => 'required',
		'email' => 'required',
		'phone_number' => 'required',
		'zip_code_origin' => 'required',
		'zip_code_destination' => 'required',
		'long' => 'required',
		'width' => 'required',
		'high' => 'required',
		'weight' => 'required',
		'description' => 'required',
        ]);

        if ($this->selected_id) {
			$record = ShippingRequest::find($this->selected_id);
            $record->update([
			'fullname' => $this-> fullname,
			'email' => $this-> email,
			'phone_number' => $this-> phone_number,
			'zip_code_origin' => $this-> zip_code_origin,
			'zip_code_destination' => $this-> zip_code_destination,
			'long' => $this-> long,
			'width' => $this-> width,
			'high' => $this-> high,
			'weight' => $this-> weight,
			'description' => $this-> description
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'ShippingRequest Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            ShippingRequest::where('id', $id)->delete();
        }
    }
}
