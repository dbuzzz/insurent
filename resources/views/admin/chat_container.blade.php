@if(!empty($users))
<div class="box-header with-border">
  <h4 class="box-title">Chat <strong>{{$users->name}}</strong></h4>
  
</div>
<div class="box-body">
                
                  <!-- Conversations are loaded here -->
                  <div id="chat-app" class="direct-chat-messages chat-app">
                  @if(count($chat) !=0)
                  @foreach($chat as $key=>$value)
                    @if($value->sender_id != Auth::user()->id)

                    <div class="direct-chat-msg mb-30">
                      <img class="direct-chat-img avatar" src="{{$users->image}}" alt="message user image">
                      <div class="direct-chat-text">
                        <p>{{$value->message}}</p>
                        <p class="direct-chat-timestamp"><time datetime="2018">{{$value->created_date}}</time></p>
                      </div> 
                       @if(!empty($value->file))
                          @foreach(unserialize($value->file) as $key1=>$value1)
                          <div class="popup-gallery row">
                          <div class="col"><a target="_blank" href="{{url('uploads/chats/'.$value1)}}" title="Caption. Can be aligned to any side and contain any HTML.">
                            <img height="50px" width="50px" src="{{url('uploads/chats/'.$value1)}}" alt="">
                          </a></div>
                        </div>
                         @endforeach                       
                        @endif                  

                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    @else
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right mb-30">
                      <div class="direct-chat-text">
                        <p>{{$value->message}}</p>
                        <p class="direct-chat-timestamp"><time datetime="2018">{{$value->created_date}}</time></p>
                      </div>
                      <!-- /.direct-chat-text -->
                       @if(!empty($value->file))
                          @foreach(unserialize($value->file) as $key1=>$value1)
                          <div class="popup-gallery row float-right">
                          <div class="col"><a target="_blank" href="{{url('uploads/chats/'.$value1)}}" title="Caption. Can be aligned to any side and contain any HTML.">
                            <img height="50px" width="50px" src="{{url('uploads/chats/'.$value1)}}" alt="">
                          </a></div>
                        </div>
                         @endforeach                       
                        @endif
                        
                    </div>
                    @endif
                  
                    @endforeach
                    @else
                  <div class="alert alert-info" role="alert">
                    Start Messaging
                  </div>
                  @endif

                @endif
                   
               

                  </div>
                  <!--/.direct-chat-messages-->    

                  <div class="box-footer">
                  <form id="chat_form">
                    <div class="input-group">
                      {{-- <input type="file" id="attach" multiple name="file[]" class="form-control"> --}}
                    <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                    <input type="hidden" value="{{$users->id}}" id="receiver_id" name="id">
                          <div class="input-group-addon">
                            <div class="align-self-end gap-items">
                              <span class="publisher-btn file-group">
                                <i class="fa fa-paperclip file-browser"></i>
                                <input type="file" id="files" name="file[]" >
                              </span>
                              <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                              {{-- <a onclick="submit()" class="publisher-btn" href="javascript:void[0]"><i class="fa fa-paper-plane"></i></a> --}}
                              <button class="publisher-btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </div>
                          </div>
                    </div>
                  </form>
                </div>           
              </div>
               