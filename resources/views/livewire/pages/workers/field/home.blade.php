<div>
        <div class="row">
            <div class="main-card mb-3 card" style="background-color:white">
                <div class="no-gutters row">
                    <div class="col-12" style="padding: 20px">
                        <div class="search-wrapper active" style="width: 100%;">
                            <div class="input-holder" style="width: 100%;">
                                <input type="text" wire:model="platNo" class="search-input" placeholder="               Masukan nomor polisi" style="text-align: center">
                                <button wire:click="submit" class="search-icon"><span></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @foreach($data as $item)

            <div>
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        @if($item->status == 'aktif')
                            <div class="modal-header" >

                                <div class="icon-box status_aktif" >
                                    <i class="material-icons">&#xE876;</i>
                                </div>
                                <h4 class="status_aktif modal-title w-100 ">Aktif!</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">No Polisi : {{$item->nopol}} <br> Jam Masuk : {{$item->tanggal}} <br>
                                    Durasi : {{$item->durasi}} Jam
                                </p>
                                <p class="text-center status_aktif">Waktu Parkir kendaraan masih tersisa</p>
                            </div>
                            <div class="modal-footer status_aktif">
                                <div class="font-bold text-2xl text-limegreen-700" style="margin: auto;font-size: 1.4rem"><span id="count-down-large"></span></div>
                            </div>
                        @else
                            <div class="modal-header" >
                                <div class="icon-box status_habis" style="background-color: red">
                                    <i class="material-icons"  style="background-color: red">&#xE888;</i>
                                </div>
                                <h4 class="modal-title w-100 status_habis">Habis!</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">No Polisi : {{$item->nopol}} <br> Jam Masuk : {{$item->tanggal}} <br>
                                    Durasi : {{$item->durasi}} Jam
                                </p>
                                <p class="text-center status_habis">Waktu Parkir kendaraan Habis</p>
                            </div>
                            <div class="modal-footer status_aktif">
                                <div class="font-bold text-2xl text-limegreen-700" style="margin: auto;font-size: 1.4rem"><span id="count-down-large"></span></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    @endforeach




{{--    <script type="text/javascript">--}}
{{--        --}}{{--const countDownDate = new Date("{{ $userTransaction->expired_at }}").getTime();--}}
{{--        const countDownDate = new Date('2022-07-05 13:59:00').getTime();--}}
{{--        // $('.status_aktif').css('display','none');--}}
{{--        $('.status_habis').css('display','none');--}}

{{--        let x = setInterval(function () {--}}
{{--            let now = new Date().getTime();--}}
{{--            let distance = countDownDate - now;--}}

{{--            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
{{--            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));--}}
{{--            let seconds = Math.floor((distance % (1000 * 60)) / 1000);--}}
{{--            minutes = minutes < 10 ? "0" + minutes : minutes;--}}
{{--            seconds = seconds < 10 ? "0" + seconds : seconds;--}}

{{--            // document.getElementById("count-down").innerHTML = hours + ":" + minutes + ":" + seconds;--}}
{{--            document.getElementById("count-down-large").innerHTML = hours + ":" + minutes + ":" + seconds;--}}

{{--            console.log(hours, minutes, seconds)--}}
{{--            if (hours == 0 && minutes == '00' && seconds == '00') {--}}
{{--                clearInterval(x);--}}
{{--                $('.status_aktif').css('display','none');--}}
{{--                $('.status_habis').css('display','block');--}}
{{--                document.getElementById("count-down").innerHTML = "00:00:00";--}}
{{--                document.getElementById("count-down-large").innerHTML = "00:00:00";--}}
{{--            }--}}
{{--        }, 1000);--}}
{{--    </script>--}}
    <style>
        .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }
        .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }
        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    </style>
</div>
