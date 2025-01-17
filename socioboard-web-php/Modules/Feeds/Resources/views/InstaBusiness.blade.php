@extends('home::layouts.UserLayout')
@section('title')
    <title>{{env('WEBSITE_TITLE')}} | Instagram Business Feeds</title>
@endsection
@section('links')
    <link rel="stylesheet" type="text/css" href="/plugins/custom/dropify/dist/css/dropify.min.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/custom/emojionearea/css/emojionearea.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/images-grid.css"/>
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="Sb_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Profile-->
                <!--begin::Row-->
                <div class="row" data-sticky-container>
                    <div class="col-xl-4">
                        <div class="sticky" data-sticky="true" data-margin-top="180px" data-sticky-for="1023"
                             data-sticky-class="kt-sticky">
                            <!-- begin:Accounts list -->
                            <div class="form-group">
                                <select
                                        class="form-control form-control-solid form-control-lg h-auto py-4 rounded-lg font-size-h6"
                                        onchange="call(this)">
                                    @if($message=== 'success')
                                        <script>
                                            var accounId = <?php echo $accounts[0]->account_id; ?>;
                                        </script>
                                        <option disabled>Select Account</option>
                                        @foreach($accounts as $data)
                                            <option
                                                    value="{{$data->account_id}}">{{$data->first_name}}
                                            </option>
                                        @endforeach
                                    @elseif($message=== 'failed')
                                        <option selected value="failed">No
                                            accounts,Some error occured
                                        </option>
                                    @elseif($message=== 'No Instagram business Pages added yet!')
                                        <option selected value="failed">No
                                            Instagram business Pages has added yet
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <!-- end:Accounts list -->
                            <!--begin::Profile-->
                            <div class="card card-custom gutter-b ">
                                @if(count($accounts)>0)
                                    <div
                                            class="card-body pt-2 position-relative overflow-hidden rounded  ribbon ribbon-top ribbon-ver">
                                        <div class="ribbon-target bg-instagram" style="top: -2px; right: 20px;">
                                            <i class="fab fa-instagram"></i>
                                        </div>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center" id="instaProfileDiv">
                                            <div
                                                    class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                <div class="symbol-label"
                                                     style="background-image:url('{{$feeds['data']->socialAccountDetails->profile_pic_url}}')"></div>
                                                <i class="symbol-badge bg-success"></i>
                                            </div>
                                            <div>
                                                <a href="{{$feeds['data']->socialAccountDetails->profile_url}}"
                                                   class="font-weight-bolder font-size-h5 text-hover-primary"
                                                   target="_blank">
                                                    {{$accounts[0]->first_name}} <i
                                                    ></i>
                                                </a>
                                                <div class="text-muted">
                                                    {{$accounts[0]->email}}
                                                </div>
                                                <!-- begin:account star rating -->
                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                        <input type="radio"
                                                               <?php if ($accounts[0]->rating === 1) echo "checked";?> name="rating1{{$accounts[0]->account_id}}"
                                                               id="rating1{{$accounts[0]->account_id}}}"
                                                               onclick="ratingUpdate('1', '{{$accounts[0]->account_id}}}');">
                                                        <label
                                                                for="rating1{{$accounts[0]->account_id}}"
                                                                class="fas fa-star"></label>
                                                        <input type="radio"
                                                               <?php if ($accounts[0]->rating == 2) echo "checked";?> name="rating1{{$accounts[0]->account_id}}"
                                                               id="rating2{{$accounts[0]->account_id}}}"
                                                               onclick="ratingUpdate('2', '{{$accounts[0]->account_id}}');">
                                                        <label
                                                                for="rating2{{$accounts[0]->account_id}}"
                                                                class="fas fa-star"></label>
                                                        <input type="radio"
                                                               <?php if ($accounts[0]->rating == 3) echo "checked";?> name="rating1{{$accounts[0]->account_id}}"
                                                               id="rating3{{$accounts[0]->account_id}}"
                                                               onclick="ratingUpdate('3', '{{$accounts[0]->account_id}}');">
                                                        <label
                                                                for="rating3{{$accounts[0]->account_id}}"
                                                                class="fas fa-star"></label>
                                                        <input type="radio"
                                                               <?php if ($accounts[0]->rating == 4) echo "checked";?> name="rating1{{$accounts[0]->account_id}}"
                                                               id="rating4{{$accounts[0]->account_id}}"
                                                               onclick="ratingUpdate('4', '{{$accounts[0]->account_id}}');">
                                                        <label
                                                                for="rating4{{$accounts[0]->account_id}}"
                                                                class="fas fa-star"></label>
                                                        <input type="radio"
                                                               <?php if ($accounts[0]->rating == 5) echo "checked";?> name="rating1{{$accounts[0]->account_id}}"
                                                               id="rating5{{$accounts[0]->account_id}}"
                                                               onclick="ratingUpdate('5', '{{$accounts[0]->account_id}}');">
                                                        <label
                                                                for="rating5{{$accounts[0]->account_id}}"
                                                                class="fas fa-star"></label>
                                                    </div>
                                                </div>
                                                <!-- end:account star rating -->
                                                <div class="mt-2">
                                                    <a href="#"
                                                       class="btn btn-sm font-weight-bold py-2 px-3 px-xxl-5 my-1"
                                                       onclick="return false" id="chatID"
                                                       title="Coming soon">Chat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Contact-->
                                        @if($feeds['data']->socialAccountDetails !== null)
                                            <div class="py-9">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="font-weight-bold mr-2">Followers :</span>
                                                    <a href="#"
                                                       class="text-hover-primary"
                                                       id="follower_count">{{$feeds['data']->socialAccountDetails->friendship_counts}}</a>
                                                </div>
                                            </div>
                                    @endif
                                    <!--end::Contact-->
                                    </div>
                                @else
                                    <div class="text-center">
                                        <div class="symbol symbol-150">
                                            <img src="/media/svg/illustrations/no-accounts.svg"/>
                                        </div>
                                        <h6>Currently no Instagram Business Account has been added for this team</h6>
                                    </div>
                                @endif
                            </div>
                            <!--end::Profile-->
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!--begin::feeds-->
                        <div class="card card-custom gutter-b" id="ss-feedsDiv">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title font-weight-bolder">Feeds</h3>
                                <div id="addToCart" class="btn btn-icon text-hover-info btn-sm  ml-5 px-5"
                                     title="Add to custom Reports">+
                                    <span node-id="ss-feedsDiv_md8" class="ss addtcartclose"></span>
                                </div>
                                <span class="spinner spinner-primary spinner-center" id="ss-feedsDiv_md8" style="
    display: none;"></span>
                            </div>
                            <div class="card-body" id="instagramFeeds">
                            @if(count($accounts)>0)
                                @if($feeds['code']=== 200)
                                    <!--begin::Video-->
                                        <script>
                                            var feedsLength = <?php echo count($feeds['data']->feeds)  ?>;
                                        </script>
                                        @if(sizeof($feeds['data']->feeds) !== 0 )
                                            @foreach($feeds['data']->feeds as $data)
                                                <?php $count = 0?>
                                                <?php $arrayImages = []?>
                                                <?php $date = 0; ?>
                                                <?php $date = date('d-m-Y H:i:s', strtotime($data->publishedDate))?>
                                                <div class="mb-5">
                                                    <!--begin::Top-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-success mr-5">
                                                        <span class="symbol-label">
                                                            <img
                                                                    src="{{$feeds['data']->socialAccountDetails->profile_pic_url}}"
                                                                    class="h-75 align-self-end" alt=""/>
                                                        </span>
                                                        </div>
                                                        <!--end::Symbol-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column flex-grow-1">
                                                            <a href="javascript:;"
                                                               class="text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$feeds['data']->socialAccountDetails->first_name}}</a>
                                                            <span
                                                                    class="text-muted font-weight-bold">{{$date}}</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Top-->
                                                    <div class="pt-4">
                                                        @if($data->mediaType === 'IMAGE')
                                                            @foreach($data->mediaUrls as $images)
                                                                <div class="">
                                                                    <img src="{{$images}}"
                                                                         class="img-fluid"/>
                                                                </div>
                                                            @endforeach
                                                        @elseif($data->mediaType === 'VIDEO')
                                                            @foreach($data->mediaUrls as $video)
                                                                <div
                                                                        class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item rounded"
                                                                            src="{{$video}}"
                                                                            allowfullscreen=""></iframe>
                                                                </div>
                                                            @endforeach
                                                        @elseif($data->mediaType === 'CAROUSEL_ALBUM')
                                                            <div class="pt-4">
                                                                <div id="image-gallery{{$count}}"></div>
                                                                @foreach($data->mediaUrls as $data2)
                                                                    <div class="">
                                                                        <img src="{{$data2}}"
                                                                             class="img-fluid"/>
                                                                    </div>
                                                                    <?php $count++;?>;
                                                            @endforeach
                                                            @endif
                                                            <!--begin::Text-->
                                                                <p class="font-size-lg font-weight-normal pt-5 mb-2">
                                                                    {{$data->captions}}
                                                                </p>
                                                                <!--end::Text-->

                                                                <!--begin::Action-->
                                                                <div class="d-flex align-items-center">
                                                                    @if($data->mediaType === 'IMAGE')
                                                                        <a id="reSocioButton"
                                                                           onclick="resocioButton('{{$data->captions}}','{{$data->mediaUrls[0]}}','image',null,null)"
                                                                           class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">
                                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                            </span>Re-socio
                                                                        </a>
                                                                    @elseif($data->mediaType === 'VIDEO')
                                                                        <a id="reSocioButton"
                                                                           onclick="resocioButton('{{$data->captions}}','{{$data->mediaUrls[0]}}','video',null,null)"
                                                                           class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">
                                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                            </span>Re-socio
                                                                        </a>
                                                                    @elseif($data->mediaType === 'CAROUSEL_ALBUM')
                                                                        <a id="reSocioButton"
                                                                           onclick="resocioButton('{{$data->captions}}','{{$data->mediaUrls[0]}}','{{strtolower($data->mediaUrls[0])}}',null,null)"
                                                                           class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">
                                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                            </span>Re-socio
                                                                        </a>
                                                                    @else
                                                                        <a id="reSocioButton"
                                                                           onclick="resocioButton('{{$data->captions}}',null,null,null,null)"
                                                                           class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">
                                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                            </span>Re-socio
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Bottom-->
                                                    </div>
                                                    <!--end::Video-->
                                                    @endforeach
                                                    @else
                                                        <div class="text-center">
                                                            <div class="symbol symbol-150">
                                                                <img src="/media/svg/illustrations/no-accounts.svg"/>
                                                            </div>
                                                            <h6>Currently no Instagram Business feeds found for this
                                                                account</h6>
                                                        </div>
                                                    @endif
                                                    @endif
                                                    @else
                                                        <div class="text-center">
                                                            <div class="symbol symbol-150">
                                                                <img src="/media/svg/illustrations/no-accounts.svg"/>
                                                            </div>
                                                            <h6>Currently no Instagram Business Accounts has been added
                                                                for this team</h6>
                                                        </div>
                                                    @endif
                                                </div>
                            </div>
                            <!--end::feeds-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--end::Profile-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->

        @endsection

        @section('scripts')
            <script src="{{asset('js/contentStudio/publishContent.js')}}"></script>
            <script src="{{asset('js/images-grid.js')}}"></script>
            <script src="{{asset('plugins/custom/dropify/dist/js/dropify.min.js') }}"></script>
            <script src="{{asset('plugins/custom/emojionearea/js/emojionearea.min.js') }}"></script>
            <script>
                // begin::sticky
                var sticky = new Sticky('.sticky');
                // end::sticky

                // accounts list div open
                $(".accounts-list-div").css({
                    display: "none"
                });
                $(".accounts-list-btn").click(function () {
                    $(".accounts-list-div").css({
                        display: "block"
                    });
                });

                $(document).ready(function () {
                    $("#discovery").trigger("click");
                    $('#addToCart').tooltip();
                });


                let pageId = 2;
                $(window).scroll(function () {
                    if (Math.ceil($(window).scrollTop()) === Math.ceil(($(document).height() - $(window).height()))) {
                        if (feedsLength >= 12) {
                            getNextInstagramFeeds(accounId, pageId);
                            pageId++;
                        }
                    }
                });

                /**
                 * TODO we've to get  the twitter feeds and data of a particular twitter account on change of twitter accounts from dropdown.
                 * This function is used for getting twitter feeds and data of a particular twitter account on change of twitter accounts from dropdown.
                 * @param {this} data- account id of that particular twitter account.
                 * ! Do not change this function without referring API format of getting the twitter feeds.
                 */
                function call(data) {
                    pageId = 2;
                    accounId = data.value;//accountid of particular twitter account from dropdown
                    getInstagramFeeds(data.value, 1);
                }

                /**
                 * TODO we've to get  the Instagram feeds and data of a particular Instagram account .
                 * This function is used for getting Instagram feeds and data of a particular Instagram account by passing the the account id and page id.
                 * @param {this} accid- account id of that particular Instagram account.
                 * @param {this} pageid- page id of that particular Instagram account.
                 * ! Do not change this function without referring API format of getting the Instagram feeds.
                 */
                function getInstagramFeeds(accid, pageid) {
                    let accounType = 12;
                    let publishedDate = 0;
                    $.ajax({
                        type: 'get',
                        url: '/get-next-instgram-feeds',
                        data: {
                            accid, pageid, accounType
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $('#instagramFeeds').append('<div class="d-flex justify-content-center" >\n' +
                                '<div class="spinner-border" role="status"  id="' + pageid + '" style="display: none;">\n' +
                                '<span class="sr-only">Loading...</span>\n' +
                                '</div>\n' +
                                '\n' +
                                '</div>');
                            $(".spinner-border").css("display", "block");
                        },
                        success: function (response) {
                            $(".spinner-border").css("display", "none");
                            if (response.code === 200) {
                                $('#instaProfileDiv,#follower_count').empty();
                                $('#follower_count').append(response?.data?.socialAccountDetails?.friendship_counts ?? 0);
                                $('#instaProfileDiv').append('<div\n' +
                                    'class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">\n' +
                                    '<div class="symbol-label"\n' +
                                    'style="background-image:url(' + response.data.socialAccountDetails.profile_pic_url + ')"></div>\n' +
                                    '<i class="symbol-badge bg-success"></i>\n' +
                                    '</div>\n' +
                                    '<div>\n' +
                                    '<a href="' + response.data.socialAccountDetails.profile_url + '"\n' +
                                    'class="font-weight-bolder font-size-h5 text-hover-primary"\n' +
                                    'target="_blank">\n' + response.data.socialAccountDetails.first_name +
                                    '<i\n' +
                                    'class="flaticon2-correct text-primary icon-md ml-2"></i>\n' +
                                    '</a>\n' +
                                    '<div class="text-muted">\n' + response.data.socialAccountDetails.email +
                                    '</div>' +
                                    '<div class="rating-css">\n' +
                                    '<div class="star-icon">\n' +
                                    (
                                        response.data.socialAccountDetails.rating === 1 ? ' <input type="radio" checked name="rating1" id="rating1">\n' +
                                            '<label for="rating1" class="fas fa-star"></label>\n' : ' <input type="radio"  name="rating1" id="rating1">\n' +
                                            '<label for="rating1" class="fas fa-star"></label>\n'
                                    ) +
                                    (
                                        response.data.socialAccountDetails.rating === 2 ? ' <input type="radio" checked name="rating2" id="rating2">\n' +
                                            '<label for="rating2" class="fas fa-star"></label>\n' : ' <input type="radio"  name="rating2" id="rating2">\n' +
                                            '<label for="rating2" class="fas fa-star"></label>\n'
                                    ) +
                                    (
                                        response.data.socialAccountDetails.rating === 3 ? ' <input type="radio" checked name="rating3" id="rating3">\n' +
                                            '<label for="rating3" class="fas fa-star"></label>\n' : ' <input type="radio"  name="rating3" id="rating3">\n' +
                                            '<label for="rating3" class="fas fa-star"></label>\n'
                                    ) +
                                    (
                                        response.data.socialAccountDetails.rating === 4 ? ' <input type="radio" checked name="rating4" id="rating4">\n' +
                                            '<label for="rating4" class="fas fa-star"></label>\n' : ' <input type="radio"  name="rating4" id="rating4">\n' +
                                            '<label for="rating4" class="fas fa-star"></label>\n'
                                    ) +
                                    (
                                        response.data.socialAccountDetails.rating === 5 ? ' <input type="radio" checked name="rating5" id="rating5">\n' +
                                            '<label for="rating5" class="fas fa-star"></label>\n' : ' <input type="radio"  name="rating5" id="rating5">\n' +
                                            '<label for="rating5" class="fas fa-star"></label>\n'
                                    ) +
                                    '                                                </div>\n' +
                                    '</div>\n' +
                                    '<div class="mt-2">\n' +
                                    '<a id="chatID" href="javascript:;" \n' +
                                    'class="btn btn-sm font-weight-bold py-2 px-3 px-xxl-5 my-1" onclick="return false" title="Coming soon">Chat</a>\n' +
                                    '</div>\n' +
                                    '</div>');
                                $(".spinner-border").css("display", "none");
                                feedsLength = response.data.feeds.length;
                                $('#instagramFeeds').empty();
                                let appendData = '';
                                let arrayImages = [];
                                let num = 0;
                                if (response.data.feeds.length > 0) {
                                    response.data.feeds.map(element => {
                                        publishedDate = String(new Date(element.publishedDate)).substring(0, 25);
                                        appendData = '<div class="mb-5">\n' +
                                            '<div class="d-flex align-items-center">\n' +
                                            '<div class="symbol symbol-40 symbol-light-success mr-5">\n' +
                                            '<span class="symbol-label">\n' +
                                            '<img\n' +
                                            'src="' + response.data.socialAccountDetails.profile_pic_url + '"\n' +
                                            'class="h-75 align-self-end" alt=""/>\n' +
                                            '</span>\n' +
                                            '</div>\n' +
                                            '<div class="d-flex flex-column flex-grow-1">\n' +
                                            '<a href="javascript:;"\n' +
                                            'class="text-hover-primary mb-1 font-size-lg font-weight-bolder">' + response.data.socialAccountDetails.first_name + '</a>\n' +
                                            '<span\n' +
                                            'class="text-muted font-weight-bold">' + publishedDate + '</span>\n' +
                                            '</div>\n' +
                                            '</div>\n' +
                                            '<div class="pt-4">';
                                        if (element.mediaType === 'IMAGE') {
                                            element.mediaUrls.map(data => {
                                                appendData += '<div class="">\n' +
                                                    '<img src="' + data + '"\n' +
                                                    'class="img-fluid"/>\n' +
                                                    '</div>\n';
                                            });
                                        } else if (element.mediaType === 'VIDEO') {
                                            element.mediaUrls.map(data => {
                                                appendData += '<div\n' +
                                                    'class="embed-responsive embed-responsive-16by9">\n' +
                                                    '<iframe class="embed-responsive-item rounded"\n' +
                                                    'src="' + data + '"\n' +
                                                    'allowfullscreen=""></iframe>\n' +
                                                    '</div>\n';
                                            });
                                        } else if (element.mediaType === 'CAROUSEL_ALBUM') {
                                            appendData += '<div class="pt-4"><div id="image-gallery' + num + '"></div>';
                                            element.mediaUrls.map(data => {
                                                if (data.mediaType === 'IMAGE') {
                                                    arrayImages.push(data);
                                                } else if (data.mediaType === 'VIDEO') {
                                                    appendData += ' <div\n' +
                                                        'class="embed-responsive embed-responsive-16by9">\n' +
                                                        '<iframe class="embed-responsive-item rounded"\n' +
                                                        'src="' + data + '"\n' +
                                                        'allowfullscreen=""></iframe>\n' +
                                                        '</div>';
                                                }
                                            });
                                        }
                                        appendData += '</div>';
                                        appendData += '<p class="font-size-lg font-weight-normal pt-5 mb-2">\n' +
                                            '' + element.captions + '\n' +
                                            '</p>\n' +
                                            '<div class="d-flex align-items-center">\n';
                                        if (element.type === 'IMAGE') {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'image' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';
                                        } else if (element.type === 'VIDEO') {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'video' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';
                                        } else {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'image' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';

                                        }
                                        appendData += '</div>\n' +
                                            '</div>\n' +
                                            '</div>\n';
                                        $('#instagramFeeds').append(appendData);
                                        $('div#image-gallery' + num).imagesGrid({
                                            images: arrayImages
                                        });
                                        num++;
                                    });
                                } else {
                                    $('#instagramFeeds').append('<div class="text-center">\n' +
                                        '<div class="symbol symbol-150">\n' +
                                        '<img src="/media/svg/illustrations/no-accounts.svg"/>\n' +
                                        '</div>\n' +
                                        '<h6>Currently no Instagram Business  feeds found for this account</h6>\n' +
                                        '</div>');
                                }

                            }
                        }
                    });
                }

                /**
                 * TODO we've to get  the Instagram feeds and data of a particular Instagram account on paginations .
                 * This function is used for getting Instagram feeds and data of a particular Instagram account by passing the the account id and page id.
                 * @param {this} accid- account id of that particular Instagram account.
                 * @param {this} pageid- page id of that particular Instagram account.
                 * ! Do not change this function without referring API format of getting the Instagram feeds.
                 */
                function getNextInstagramFeeds(accid, pageId) {
                    let accounType = 12;
                    $.ajax({
                        type: 'get',
                        url: '/get-next-instgram-feeds',
                        data: {
                            accid, pageId, accounType
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $('#instagramFeeds').append('<div class="d-flex justify-content-center" >\n' +
                                '<div class="spinner-border" role="status"  id="' + pageId + '" style="display: none;">\n' +
                                '<span class="sr-only">Loading...</span>\n' +
                                '</div>\n' +
                                '</div>');
                            $(".spinner-border").css("display", "block");
                        },
                        success: function (response) {
                            $(".spinner-border").css("display", "none");
                            if (response.code === 200)
                            {
                                feedsLength = response.data.feeds.length;
                                let appendData = '';
                                let publishedDate = 0;
                                if (response.data.feeds.length > 0) {
                                    response.data.feeds.map(element => {
                                        publishedDate = String(new Date(element.publishedDate)).substring(0, 25);
                                        appendData = '<div class="mb-5">\n' +
                                            ' <div class="d-flex align-items-center">\n' +
                                            ' <div class="symbol symbol-40 symbol-light-success mr-5">\n' +
                                            ' <span class="symbol-label">\n' +
                                            '<img\n' +
                                            'src="' + response.data.socialAccountDetails.profile_pic_url + '"\n' +
                                            'class="h-75 align-self-end" alt=""/>\n' +
                                            '</span>\n' +
                                            '</div>\n' +
                                            '<div class="d-flex flex-column flex-grow-1">\n' +
                                            '<a href="javascript:;"\n' +
                                            'class="text-hover-primary mb-1 font-size-lg font-weight-bolder">' + response.data.socialAccountDetails.first_name + '</a>\n' +
                                            '<span\n' +
                                            'class="text-muted font-weight-bold">' + publishedDate + '</span>\n' +
                                            '</div>\n' +
                                            '</div>\n' +
                                            '<div class="pt-4">\n';
                                        if (element.mediaType === 'IMAGE') {
                                            element.mediaUrls.map(image => {
                                                appendData += '<div class="">\n' +
                                                    '<img src="' + image + '"\n' +
                                                    'class="img-fluid"/>\n' +
                                                    '</div>\n';
                                            });
                                        } else if (element.mediaType === 'VIDEO') {
                                            element.mediaUrls.map(video => {
                                                appendData += '<div\n' +
                                                    'class="embed-responsive embed-responsive-16by9">\n' +
                                                    '<iframe class="embed-responsive-item rounded"\n' +
                                                    'src="' + video + '"\n' +
                                                    'allowfullscreen=""></iframe>\n' +
                                                    '</div>\n';
                                            });
                                        } else if (element.mediaType === 'CAROUSEL_ALBUM') {
                                            element.mediaUrls.map(data => {
                                                if (data.mediaType == 'IMAGE') {
                                                    appendData += '<div class="">\n' +
                                                        '<img src="' + data + '"\n' +
                                                        'class="img-fluid"/>\n' +
                                                        '</div>';
                                                } else if (data.mediaType == 'VIDEO') {
                                                    appendData += ' <div\n' +
                                                        'class="embed-responsive embed-responsive-16by9">\n' +
                                                        '<iframe class="embed-responsive-item rounded"\n' +
                                                        'src="' + data + '"\n' +
                                                        'allowfullscreen=""></iframe>\n' +
                                                        '</div>';
                                                }

                                            });
                                        } else {
                                            appendData += '<p class="font-size-lg font-weight-normal pt-5 mb-2">\n' +
                                                '' + element.captions + '\n' +
                                                '</p>';
                                        }
                                        appendData += '<p class="font-size-lg font-weight-normal pt-5 mb-2">\n' +
                                            '' + element.captions + '\n' +
                                            '</p>\n' +
                                            '<div class="d-flex align-items-center">\n';
                                        if (element.type === 'IMAGE') {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'image' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';
                                        } else if (element.type === 'VIDEO') {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'video' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';
                                        } else {
                                            appendData += '<a id="reSocioButton"\n' +
                                                'onclick="resocioButton(\'' + element.captions + '\',\'' + element.mediaUrls[0] + '\',\'' + 'image' + '\',null,null)"\n' +
                                                'class="btn btn-hover-text-success btn-hover-icon-success btn-sm bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2">\n' +
                                                '<span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">\n' +
                                                '<i class="fas fa-pencil-alt"></i>\n' +
                                                '</span>Re-socio\n' +
                                                '</a>\n';

                                        }
                                        appendData += '</div>\n' +
                                            '</div>\n' +
                                            '</div>\n';
                                        $('#instagramFeeds').append(appendData);
                                    });
                                } else {
                                    $('#instagramFeeds').append('<div class="text-center">\n' +
                                        '<div class="symbol symbol-150">\n' +
                                        '<img src="/media/svg/illustrations/no-accounts.svg"/>\n' +
                                        '</div>\n' +
                                        '<h6>Currently no Instagram Business  feeds found for this account</h6>\n' +
                                        '</div>');
                                }

                            }
                        }

                    });
                }

                /**
                 * TODO We have to publish particular twitter post from particular twitter feed on multiple social account.
                 * This function is used for publishing  particular twitter post from particular twitter feed on multiple social account
                 * @param {string} description-description of particular twitter post .
                 * @param {string} mediaUrl- link of image or video in the twitter post.
                 * @param {string} type- type of the post video ,image or no media urls.
                 * @param {string} title- title on post.
                 * @param {sourceUrl} sourceUrlon post.
                 * ! Do not change this function without referring API format of resocio.
                 */
                function resocioButton(description, mediaUrl, type, title, sourceUrl) {
                    publishOrFeeds = 1;
                    $('body').find('#resocioModal').remove();
                    let action = '/discovery/content_studio/publish-content/feeds-modal';
                    let isType = (type == null) ? 'no media' : type;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: action,
                        data: {
                            mediaUrl, sourceUrl,
                            description, type, isType
                        },
                        success: function (data) {
                            $('body').append(data.html);
                            $('body').find('#resocioModal').modal('show');
                            // begin:normal post emoji
                            $('body').find("#normal_post_area").emojioneArea({
                                pickerPosition: "right",
                                tonesStyle: "bullet"
                            });
                            setTimeout(function () {
                                downloadMediaUrl('fb');
                            }, 3000);
                        },
                        error: function (error) {
                            if (error.responseJSON.message) {
                                toastr.error(`${error.responseJSON.message}`);
                            }
                        },
                    });
                };
            </script>

@endsection