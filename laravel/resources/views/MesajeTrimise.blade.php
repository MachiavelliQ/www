@extends('layouts.PrimaPaginaLayout')

@section('Mesaje')
<div class = "Mesaje">









<div class = "DisplayMessages">

	<div class = "upperIndex">
		<span style = "font-weight:bold;">Inbox</span>
		<select onChange="window.location.href=this.value">

  <option value="/profil/{{Auth::user()->username}}/mesaje/mesaje-trimise">Mesaje Trimise</option>
<option value="/profil/{{Auth::user()->username}}/mesaje">Mesaje Primite</option>
</select>
		<input style = "margin-left:470px;"type = "text" value = "Cautare"></input>
	</div>

	<div class = "lowerIndex">
		<table style="width:95%">
			  <tr>
			    <th>Destinatar</th>
			    <th>Subiect</th>
			    <th>Data trimiterii</th>
			  </tr>
			  


		</table>
		<hr>
		

    @foreach ($mesaje as $mesaj)
       @foreach ($users as $user)

         @if ($user->user_id == $mesaj->destinatar_id && Auth::user()->user_id == $mesaj->expeditor_id &&  $mesaj->viz_dest != 1)
              
                
                	<div >
                		
                	<a style = "line-height:30px;position:relative;padding:16px 18px 16px 120px;display: inline; height: 100%;"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$user->username}}</a>

                	<a style = "padding:16px 18px 16px 220px;display: inline; height: 100%;"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"> {{$mesaj->subiect}}</a>
               
                	<a style = "padding:16px 170px 16px 210px;display:inline; height: 100%;"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$mesaj->data_mesajului}}<a>
                	
                	<a style = "padding:16px 170px 16px 210px;display:inline; height: 100%;"href = "/profil/{{Auth::user()->username}}/mesaje/sterge-mesaje/{{ $mesaj->mesaj_id }}">X<a>
                  </div><hr>  
         @endif
      @endforeach
    @endforeach



	</div>

	</div>

</div>
@stop