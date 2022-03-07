<?php

namespace App\Http\Livewire;

use App\Models\Images;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTheParents extends Component
{
    use WithFileUploads;

    public $currentStep = 1,
        $email, $password,

        //Father Input
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother Input
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;


    public $catchError;
    public $successMessage = '';

    public $updateMode = false,
        $photos,
        $show_table = true,
        $Parent_id;


    //To make inputs required
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'Passport_ID_Father' => 'min:10|max:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }


    public function render()
    {
        return view('livewire.add-the-parents', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => TypeBlood::all(),
            'Religions' => Religion::all(),
            'my_parents' => MyParent::all(),
            'Parent_images' => DB::table('images')->where('imageable_id', '=', $this->Parent_id)->get(),
            'GetParents' => DB::table('my_parents')->where('id', '=', $this->Parent_id)->get(),
        ]);
    }

    public function showformadd(){
        $this->show_table = false;
    }

    public function BackToParentsTable(){
        $this->show_table = true;
        return redirect()->to('add_parent');
    }

    //First Btn
    public function FirstNextBtn(){
        $this->validate([
            'email' => 'required|unique:my_parents,Email,'.$this->id,
            'password' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //Second Btn
    public function SecondNextBtn(){

        $this->validate([
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my_parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my_parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 3;
    }

    //First Btn
    public function ThirdNextBtn(){
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my_parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my_parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 4;
    }

    public function FourthNextBtn(){
        $this->currentStep = 5;
    }

    public function submitForm(){
        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
            $My_Parent->Address_Father = $this->Address_Father;

            // Mother_INPUTS
            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->Address_Mother = $this->Address_Mother;
            $My_Parent->save();

            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $name = $photo->getClientOriginalName();
                    $photo->storeAs('attachments/parents/'.$this->National_ID_Father, $photo->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Images();
                    $images->filename = $name;
                    $images->imageable_id = MyParent::latest()->first()->id;
                    $images->imageable_type = 'App\Models\MyParent';
                    $images->save();
                }
            }

            $this->successMessage = trans('main_trans.success');
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }

    }

    private function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';


    }



    //To show value of inputs
    //To get the values from database
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->email = $My_Parent->email;
        $this->password = $My_Parent->password;
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father =$My_Parent->Address_Father;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Mother', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$My_Parent->Address_Mother;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }


    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }
    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }
    //ThirdStepSubmit_edit
    public function ThirdStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 4;
    }
    //ThirdStepSubmit_edit
    public function FourthStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 5;
    }
    //submitForm_edit
    public function submitForm_edit(){
        if ($this->Parent_id){
            $parent = MyParent::find($this->Parent_id);
            $parent->update([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'National_ID_Father' => $this->National_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
                'Nationality_Father_id'=> $this->Nationality_Father_id,
                'Blood_Type_Father_id'=> $this->Blood_Type_Father_id,
                'Religion_Father_id'=> $this->Religion_Father_id,
                'Address_Father'=>$this->Address_Father,
                // Mother_INPUTS
                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
                'National_ID_Mother' => $this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
                'Nationality_Mother_id' => $this->Nationality_Mother_id,
                'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
                'Religion_Mother_id' => $this->Religion_Mother_id,
                'Address_Mother' => $this->Address_Mother,
            ]);

        }

        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAs('attachments/parents/'.$this->National_ID_Father, $photo->getClientOriginalName(),'upload_attachments');

                // insert in image_table
                $images= new Images();
                $images->filename = $name;
                $images->imageable_id = $this->Parent_id;
                $images->imageable_type = 'App\Models\MyParent';
                $images->save();
            }
        }

        toastr()->success(trans('main_trans.success'));
        return redirect()->to('/add_parent');
    }

    public function delete($id){
        MyParent::findOrFail($id)->delete();
        toastr()->success(trans('main_trans.Delete_M'));
        return redirect()->to('/add_parent');
    }

    public function delete_Photo($id){
//       $P_A =  ParentAttachment::findOrFail($id);
//       $M_P = MyParent::findOrFail($id);
//        Storage::disk('public')->delete('storage/'.$M_P->National_ID_Father.'/'.$P_A->file_name);
//    $P_A->delete();
        Images::findOrFail($id)->delete();
    }

    public function BackBtn($step){
        $this->currentStep = $step;
    }


}
