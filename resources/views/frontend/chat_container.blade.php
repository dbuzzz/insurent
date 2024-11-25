@if(count($chat)!=0)
			  	@foreach($chat as $key=>$value)
			  	@if($value->user_id == Auth::user()->id)
			  	<div class="direct-chat-msg right mb-30">
					  <div class="clearfix mb-15">
						<span class="direct-chat-name float-right">You</span>
					  </div>
					  <div class="direct-chat-text">
						<p>{{$value->message}}</p>
						<p class="direct-chat-timestamp"><time datetime="2018">{{$value->created_date}}</time></p>
					  </div>
					  <!-- /.direct-chat-text -->
					</div>
					@else
					<div class="direct-chat-msg mb-30">
					  <div class="clearfix mb-15">
						<span class="direct-chat-name">{{$value->name}}</span>
						{{-- <span class="direct-chat-timestamp pull-right">April 14, 2017</span> --}}
					  </div>
					  <!-- /.direct-chat-img -->
					  <div class="direct-chat-text">
						<p>{{$value->message}}</p>
						<p class="direct-chat-timestamp"><time datetime="2018">{{$value->created_date}}</time></p>
					  </div>

					</div>
					@endif

					
					@endforeach
					@endif