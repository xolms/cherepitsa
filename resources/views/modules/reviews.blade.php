

<div class="tm_pb_section  tm_pb_section_3 tm_section_regular tm_section_transparent">
    <div class="container">
        <div class=" row tm_pb_row tm_pb_row_3">
            <div class="tm_pb_column tm_pb_column_4_4  tm_pb_column_4 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tm_pb_vertical_alligment_start">
                <div class="tm_pb_text tm_pb_module tm_pb_bg_layout_light tm_pb_text_align_center  tm_pb_text_1">
                    <h4>Отзывы</h4>
                </div>
                <!-- .tm_pb_text -->
            </div>
            <!-- .tm_pb_column -->
        </div>
        <!-- .tm_pb_row -->
    </div>
    <div class="container">
        <div class=" row tm_pb_row tm_pb_row_4">
            @foreach($rev as $item)
                <div class="tm_pb_column tm_pb_column_1_2  tm_pb_column_5 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm_pb_vertical_alligment_start">
                    <div class="tm_pb_cherry_testi tm_pb_cherry_testi_0">
                        <div class="tm-testi">
                            <div class="tm-testi__wrap tm-testi__wrap--perview-1 tm-testi__wrap--shortcode tm-testi__wrap--listing tm-testi--default">
                                <div class="tm-testi__list">
                                    <div class="tm-testi__item">
                                        <div class="tm-testi__inner">
                                            <blockquote>
                                                @if(isset($item->img))
                                                    <img src="{{$item->img}}" class="tm-testi__item-avatar avatar wp-post-image" alt="{{$item->name}}" width="100" height="100">
                                                @endif
                                                    <div class="tm-testi__item-body">
                                                    <p>{{$item->text}}</p>
                                                    <footer>
                                                        <cite><span class="tm-testi__item-name">{{$item->name}}</span></cite>
                                                    </footer>
                                                </div>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .tm_pb_cherry_testi -->
                </div>
                <!-- .tm_pb_column -->
            @endforeach
            <!-- .tm_pb_column -->
        </div>
        <!-- .tm_pb_row -->
    </div>
</div>

