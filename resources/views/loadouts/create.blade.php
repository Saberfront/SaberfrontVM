@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<div class='content-wrapper'>
<section class='content-header'>
 
</section>
<section class='content'>
	<form action="{{ secure_url('/loadouts/create') }}" method="POST">
<div class="box">
<div class="box-header">
  <h3 class="box-title">Create a new Custom Loadout</h3>
  <div class="box-tools">
   <button type="submit" class="btn btn-primary btn-box-tool" style="color: white">Create and Save</button>
  </div>
</div>
<div class="box-body">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group has-feedback">
   <label for="loadout_name">Loadout Name</label>
   <input type="text" name="loadout_name" class="form-control" placeholder="Name Your Loadout">
</div>
        <div class="form-group has-feedback">
        <label for="weapon_name">Primary Weapon of Choice</label>
           <select class="js-states form-control has-feedback weaponSelector" name="weapon_name" >
            <optgroup label="Carbines">
            	           	<option value="E-11">E-11</option>
            	           	<option value="WESTAR-M5">WESTAR M5</option>
            </optgroup>
            <optgroup label="Snipers">
            	           	<option value="DC15X">DC-15x</option>
                    <option value="E-17d">E-17d</option>
            </optgroup>
            <optgroup label="Scatterblasters">
            	           	<option value="E-11E">E-11E</option>
<option value="EE-4">EE-4</option>

            </optgroup>
            <optgroup label="Assault Blasters"><option value="A280">A280(C)</option>
            <option value="DC17M">DC-17m</option>
            <option value="EE-3">EE-3</option>
            <option value="E-11D">E-11D</option>
            </optgroup>
           	<optgroup label="DMR Blasters"><option value="E-5">E-5</option>
            <option value="DC15A">DC-15A</option>
            <option value="DC15S">DC-15S(Rifle)</option>
           	</optgroup>
            <optgroup label="Heavy blaster pistols"><option disabled="disabled" value="DL-44">DL-44</option></optgroup>
            <optgroup label="Blaster pistols">
            	<option disabled="disabled" value="DC-17b">DC-17 hand blaster</option>
            	<option disabled="disabled" value="A280 CFE">A280 CFE</option>
            	<option disabled="disabled" value="SE-14">SE-14</option>
            	<option disabled="disabled" value="WESTAR-34">WESTAR 34</option>
            	<option disabled="disabled" value="Westar-35">WESTAR 35</option>
            	<option disabled="disabled" value="ELG-3A">ELG-3A</option>
            </optgroup>
           	
           </select>
        </div>
          <div class="form-group">
        <label for="secondary_name">Secondary Weapon of Choice</label>
           <select class="js-states form-control weaponSelector" name="secondary_name" >
            <optgroup label="Carbines">
            	           	<option disabled value="E-11">E-11</option>
            	           	<option disabled value="WESTAR M5">WESTAR M5</option>
            </optgroup>
            <optgroup label="Snipers">
            	           	<option disabled value="DC-15x">DC-15x</option>
                    <option disabled value="E-17d">E-17d</option>
            </optgroup>
            <optgroup label="Scatterblasters">
            	           	<option disabled value="E-11E">E-11E</option>
<option disabled value="EE-4">EE-4</option>

            </optgroup>
            <optgroup disabled label="Assault Blasters"><option disabled value="A280">A280(C)</option>
            <option disabled value="DC17M">DC-17m</option>
            <option disabled value="EE-3">EE-3</option>
            </optgroup>
           	<optgroup label="DMR Blasters"><option disabled value="E-5">E-5</option>
            <option disabled value="DC15A">DC-15A</option>
            <option disabled value="DC15S">DC-15S(Rifle)</option>
           	</optgroup>
            <optgroup label="Heavy blaster pistols"><option value="DL-44">DL-44</option></optgroup>
            <optgroup label="Blaster pistols">
            	<option value="DC-17b">DC-17 hand blaster</option>
            	<option value="A280 CFE">A280 CFE</option>
            	<option  value="SE-14">SE-14</option>
            	<option  value="Westar 34">WESTAR 34</option>
            	<option  value="WESTAR 35">WESTAR 35</option>
            	<option  value="ELG-3A">ELG-3A</option>
            </optgroup>
           	
           </select>
        </div>
	<input type="hidden" name="rid" value="{{Auth::user()->robloxUserId}}"/>

    <div class="form-group has-feedback"><input type="checkbox" class="form-control" name="public"><label for="public">Public?</label></div>
        	</div>
	</div>
		</form>

</section>
</div>

@endif
@endsection