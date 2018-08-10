<div class="navbar-default sidebar bg-white" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                       <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> All Courses <span class="fa arrow"></span></a>
                           
                            <ul class="nav nav-second-level">
                                @foreach(App\Models\Users::find(Auth::user()->id)->subjects as $subject)
                        
        
                                 <li>
                                    <a href="#"><i class="glyphicon glyphicon-book"></i> {{$subject->name}}<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                 <li>
                                    <a href="{{url('student/'.$subject->name.'/video/index')}}">Video</a>
                                </li>
                                 <li>
                                    <a href="{{url('student/'.$subject->name.'/forum')}}">Forum</a>
                                </li>
                                <li>
                                    <a href="{{url('student/'.$subject->name.'/docs/index')}}">Document</a>
                                </li>
                                 <li>
                                    <a href="{{url('student/'.$subject->name.'/showtest')}}">Examination</a>
                                </li>
                                       </ul>

                                 </li>
                                @endforeach
                            </ul>
                            
                        
                        
                        <li>
                            <a  href="{{url('/login/logout')}}"><i class="fa fa-unlock fa-fw"></i> Logout</a>
                        </li>

                        
                    </ul>
                </div>
               
            </div>




