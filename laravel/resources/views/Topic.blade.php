@extends('layouts.PrimaPaginaLayout')




@section('Topic')
<?php 

 $id = DB::table("topics")->where("topic_urlslug",Request::segment(3))->first();

 $likes = $id->likes;
 $dislikes = $id->dislikes;
?>

<script type="text/javascript">
var my_var = <?php echo json_encode($likes); ?>;
var my_var2 = <?php echo json_encode($dislikes); ?>;
var topic = <?php echo json_encode(Request::segment(3)); ?>;

</script>


<script src = "/js/TopicJs.js"></script>
<script src = "/js/LikeButton.js"></script>
<script src = "/js/RaspunsAcceptat.js"></script>
<style type="text/css">
#check {
	color:gray;
}
#check:hover {
	color:green;

}
button {
			background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline: none;
            margin-left:20px;
            position:relative;
            color:gray;
            
}

button:hover {
	color:black;
}

label { display: inline-block; width: 140px; text-align: right; }​
</style>
<?php require_once '/php/Parsedown.php';
$parsedown = new Parsedown();

//echo $parsedown->text($text);
 ?>
 @if(Auth::check())
<?php 

$topic_id = DB::table('topics')->where('topic_urlslug',Request::segment(3))->first();

$likes = DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',$topic_id->topic_id)->first();
$dislikes = DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',$topic_id->topic_id)->first();

if(count($likes) != 0)
{
	echo '<style>

		button#likeButton {
			color: green;
		}

		button#likeButton:hover {
	color:green;
}

	</style>';
}

if(count($dislikes) != 0)
{
	echo '<style>

		button#dislikeButton {
			color: red;
		}

		button#dislikeButton:hover {
	color:red;
}

	</style>';
}

?>

@endif



	
	<div  id = "TopicForm">
		
			
	

	<div class="form-group">
		<div style = "margin-left:367px;margin-top:160px;"class = "arrow_box_border"></div>
		<div style = "margin-left:366px;margin-top:160px;"class = "arrow_box"></div>
				<div class = "topic">


				@foreach($topic as $topics)
<img  style = "border:5px groove gray;float:left;width:100px;height:100xp;margin-left:-157px;margin-top:-30px;position:relative;" src="/<?php echo $topics->image; ?>">

@if(Auth::check() && Auth::user()->user_type == 'admin')
			
<input class = "btn-x"  type="button" value = "&#10006;" onclick="location.href='/topicdelete/<?php echo Request::segment(3); ?>';">
		@endif		
						<span style = "margin-right:450px;">{{ $topics->username }} intreaba:</span><br><br>
						<span ><?php echo wordwrap($parsedown->text($topics->contents), 65, "<br />", true); ?></span><br><br>
						
					
					
					

				@endforeach
<?php $id = DB::table('topics')->where('topic_urlslug',Request::segment(3))->first(); $topic_id = $id->topic_id; ?>
<form method = "POST" id = "LikesForm" action = "/likeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-up fa-2x" id = "likeButton" type = "submit" class = "btnNou" value = "Like">
		<span style = "margin-left:0px;font-size:15px;font-weight:bold;color:black;"id = "likes">{{$id->likes}} likes</span>
		</button>
		

</form>

<form method = "POST" id = "DislikeForm" action = "/dislikeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-down fa-2x" id = "dislikeButton" type = "submit" class = "btnNou" value = "disLike">
		<span style = "margin-left:0px;font-size:15px;font-weight:bold;color:black;"id = "dislikes">{{$id->dislikes}} dislikes</span>
		</button>
		

</form>

			</div><br>
<div class = "reply">
						<form id = "form"class = "" action = "/PostReply" method = "POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<div class = "form-group">
									<div class = "arrow"></div>
								
								<div style="display: inline-block; position: relative;" id = "resizable">
								<textarea class = "content-box"id = "reply"name = "reply" cols = "40" rows = "10" placeholder = "Raspunde la aceasta intrebare"></textarea>
						
							</div>

							<div class="ui-resizable-handle ui-resizable-s"></div>
						<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou" value = "Raspunde">
						</div>
							
								<input name = "topic_id" type = "hidden" value = "<?php echo Request::segment(3); ?>">
								
						

						</form>
					</div>

			<br>
			<?php $topict = DB::table('replies')->where('topic',Request::segment(3))->get(); ?>
		<div style = "width:625px;padding:20px;background-color:deepskyblue;border-radius:5px;"class = "raspunsuri">

			<span> Raspunsuri:<?php echo count($topict); ?></span>



		</div>
				<br><br><br>
				
				@foreach($replies as $reply)
			
			<style type="text/css">

#check_{{$reply->reply_id}} {
	color:gray;
}
#check_{{$reply->reply_id}}:hover {
	color:green;

}

			</style>
				
				<?php $vari = 0; if (DB::table('replies')->where('topic',Request::segment(3))->where('acceptat','1')->first()) $vari = DB::table('replies')->where('topic',Request::segment(3))->where('acceptat','1')->first();?>
		@if(Auth::check() && Auth::user()->user_type == 'admin' || $reply->reply_id == $vari->reply_id)
		<?php if($vari && $reply->reply_id == $vari->reply_id): ?>
			
			<a onClick="raspuns_acceptat({{$reply->reply_id}})"name = "check"href = "javascript:void(0);"id = "check_{{$reply->reply_id}}" style = "color:green;cursor:pointer;"class="fa fa-check fa-3x acceptat"></a>
		<?php else: ?>		
			<a onClick="raspuns_acceptat({{$reply->reply_id}})"name = "check"href = "javascript:void(0);"id = "check_{{$reply->reply_id}}" style = "cursor:pointer;"class="fa fa-check fa-3x acceptat"></a>
		<?php endif; ?>
@endif
			<div class = "topic">
				<div>
				@if(Auth::check() && Auth::user()->user_type == 'admin')
			
					<input class = "btn-x"  type="button" value = "&#10006;" onclick="location.href='/replydelete/{{ $reply->reply_id }}';">
				@endif

					<div style = "position:relative;margin-left:-30px;margin-top:-25px;"class = "arrow_box_border"></div>
		
				<div style = "position:relative;margin-left:-30px;margin-top:-30px;"class = "arrow_box"></div>
			
					<span style = "font-size:16px;font-weight:normal;margin-right:450px;">{{ $reply->username }} raspunde:</span><br><br>
						<img  style = "border:5px groove gray;width:100px;height:100px;float:left;margin-left:-156px;margin-top:-67px;position:relative;" src="/<?php echo $reply->image; ?>">
						<span >{{ $reply->content }}</span>
				</div><br>
						<a href = "javascript:void(0)"onClick = "replyReply({{ $reply->reply_id }});" class = "reply->reply_id"style = "color:blue">Raspunde</a><br><br>
						
						<form id = "{{ $reply->reply_id }}" style = "display:none;"action = "/PostReplyReply" method = "POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input name = "topic_id" type = "hidden" value = "<?php echo Request::segment(3); ?>">
								
							<textarea class = "content-boxR" name = "reply" cols = "10" rows = "2" placeholder = "Raspunde la aceast comentariu"></textarea>
							<input style = "margin-left:500px;position:relative;font-size:15px;padding:6px 13px;"type = "submit" class = "btnNou" value = "Raspunde">
							<input name = "reply_id" type = "hidden" value = "{{ $reply->reply_id }}">
								
						</form>
			
			</div>	<br>
@foreach($repliesReply as $replyReply)
				@if($reply->reply_id == $replyReply->replies_id )
					<div class = "topic">

							{{$replyReply->repliesReply_content}}
					
					</div><br>
				@endif
@endforeach
			<br>
				
				@endforeach
			

	</div>


<br><br>

</div>

@stop