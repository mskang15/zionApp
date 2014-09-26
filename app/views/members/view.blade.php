<div class="table-responsive">

    <!-- Nav tabs -->
    <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#studies" role="tab" data-toggle="tab">Study</a></li>
        <li><a href="#videos" role="tab" data-toggle="tab">Video</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="studies">
            <table class="table table-hover table-condensed">
                <thead>
                <caption><h3>Study Progress</h3></caption>
                </thead>
                <tbody>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Teacher</th>
                    <th>Study Date</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php $lessons = array(); ?>
                <?php $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $segments = explode('/', $_SERVER['REQUEST_URI_PATH']); ?>
                {{ Form::open(array('url' => 'users/study')) }}
                <input type="hidden" name="teacher_id" value="<?= Auth::user()->id ?>" />
                <input type="hidden" name="member_id" value="{{$segments[2]}}" />
                <input type="hidden" name="study_id" value=""/>
                <!--Get all the studies this student has done.-->

                @foreach($studies as $study)
                    @if($study['type'] == '1')
                <tr>
                    <td>{{ $study['order'] }}<span id="study_id" style="display:none" class="<?= $study['id'] ?>"></span></td>
                    <td>{{ $study['shortName'] }}</td>
                    @if(isset($study["studied"]))

                    <td> {{User::find($study['teacher_id'])->name}} </td>
                    <td> {{$study['study_date']}}</td>
                    <td><button class="btn btn-small btn-danger delete">Delete</button></td>

                    @else
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-primary btn-small study">Study</button></td>
                    @endif
                </tr>
                    @endif
                @endforeach
                {{ Form::close() }}
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="videos">
            <table class="table table-hover table-condensed">
                <thead>
                <caption><h3>Video List</h3></caption>
                </thead>
                <tbody>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Teacher</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php $lessons = array(); ?>
                <?php $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $segments = explode('/', $_SERVER['REQUEST_URI_PATH']); ?>
                {{ Form::open(array('url' => 'users/study')) }}
                <input type="hidden" name="teacher_id" value="<?= Auth::user()->id ?>" />
                <input type="hidden" name="member_id" value="{{$segments[2]}}" />
                <input type="hidden" name="study_id" value=""/>
                <!--Get all the studies this student has done.-->

                @foreach($studies as $study)
                    @if($study['type'] == '2')
                <tr>
                    <td>{{ $study['order'] }}<span id="study_id" style="display:none" class="<?= $study['id'] ?>"></span></td>
                    <td>{{ $study['shortName'] }}</td>
                    @if(isset($study["studied"]))

                    <td> {{User::find($study['teacher_id'])->name}} </td>
                    <td> {{$study['study_date']}}</td>
                    <td><button class="btn btn-small btn-danger delete">Delete</button></td>
                    @else
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-primary btn-small study">Watch</button></td>
                    @endif
                </tr>
                    @endif
                @endforeach
                {{ Form::close() }}
                </tbody>
            </table>
        </div>

    </div><!-- End of Tabs-->

</div>
        <a href="/" style="color:white"><button class="btn btn-info" style="float:left">Go Back</button></a>


        <script>
    $(document).ready(function() {
        $(window).load(function(){
           $('.study_nav').addClass('ui-btn-active');
        });

        $('button.study').click(function(e){
            var studyId = $(this).parent().parent().find('span#study_id').prop('class');
            $('input[name="study_id"]').val(studyId);
        });

        $('button.delete').click(function(e){
            var studyId = $(this).parent().parent().find('span#study_id').prop('class');
            $('input[name="study_id"]').val(studyId);
            $('form').attr('action', 'http://localhost:8000/users/delete');
        });

        $(function () {
            $('#myTab a:last').tab('show')
        })

    });


</script>