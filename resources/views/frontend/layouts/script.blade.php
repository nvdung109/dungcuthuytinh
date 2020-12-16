<script type="text/javascript">
$(document).ready(function() {
  $("#slideshow0").owlCarousel({
    itemsCustom : [
    [0, 1]
    ],
    autoPlay: 4000,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    loop: true,
    navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    navigation : true,
    pagination:false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#category-name").owlCarousel({
      itemsCustom : [
      [0, 1],
      [320, 2],
      [992, 6],
      ],   
      loop: true,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
  });
</script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#carousel0").owlCarousel({
          itemsCustom : [
          [0, 2],
          [600, 4],
          [768, 5],
          ],
          autoPlay: 2000,
          loop: true,
          navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
          navigation : false,
          pagination:false
        });
      });
</script>
<script type="text/javascript">
   function headermenu() {
     if (jQuery(window).width() < 992)
     {
       jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle","dropdown");        
     }
     else
     {
       jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle",""); 
     }
   }
   $(document).ready(function(){headermenu();});
   jQuery(window).resize(function() {headermenu();});
   jQuery(window).scroll(function() {headermenu();});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#latest").owlCarousel({
      itemsCustom : [
      [0, 2],
      [375, 2],
      [600, 3],
      [768, 4],
      [992, 4],
      [1200, 5],
      [1410, 6]
      ],
      // autoPlay: 1000,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-testi").owlCarousel({
      itemsCustom : [
      [0, 1],
      [768, 2],
      [992, 2],
      [1200, 3]
      ],
      autoPlay: false,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-testi").owlCarousel({
      itemsCustom : [
      [0, 1],
      [768, 2],
      [992, 2],
      [1200, 3]
      ],
      autoPlay: false,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#special").owlCarousel({
        itemsCustom : [
        [0, 2],
        [375, 2],
        [600, 3],
        [768, 4],
        [992, 4],
        [1200, 5],
        [1410, 6]
        ],
      // autoPlay: 1000,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#blog").owlCarousel({
        itemsCustom : [
        [0, 1],
        [600, 2],
        [768, 2],
        [992, 3],
        [1200, 4]
        ],
      // autoPlay: 1000,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#owl-testi").owlCarousel({
    itemsCustom : [
    [0, 1],
    [768, 2],
    [992, 2],
    [1200, 3]
    ],
    autoPlay: false,
    navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    navigation : true,
    pagination:false
    });
  });
  </script>

  {{-- chitietsp --}}
  <script type="text/javascript"><!--
  $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
    $.ajax({
      url: 'index.php?route=product/product/getRecurringDescription',
      type: 'post',
      data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
      dataType: 'json',
      beforeSend: function() {
        $('#recurring-description').html('');
      },
      success: function(json) {
        $('.alert-dismissible, .text-danger').remove();

        if (json['success']) {
          $('#recurring-description').html(json['success']);
        }
      }
    });
  });
</script>
  <!--for product quantity plus minus-->
  <script type="text/javascript">
    //plugin bootstrap minus and plus
    $(document).ready(function() {
      $('.btn-number').click(function(e){
        e.preventDefault();
        var fieldName = $(this).attr('data-field');
        var type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
          if (type == 'minus') {
            var minValue = parseInt(input.attr('min'));
            if (!minValue) minValue = 1;
            if (currentVal > minValue) {
              input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == minValue) {
              $(this).attr('disabled', true);
            }

          } else if (type == 'plus') {
            var maxValue = parseInt(input.attr('max'));
            if (!maxValue) maxValue = 999;
            if (currentVal < maxValue) {
              input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == maxValue) {
              $(this).attr('disabled', true);
            }

          }
        } else {
          input.val(0);
        }
      });
      $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
      });
      $('.input-number').change(function() {

        var minValue = parseInt($(this).attr('min'));
        var maxValue = parseInt($(this).attr('max'));
        if (!minValue) minValue = 1;
        if (!maxValue) maxValue = 999;
        var valueCurrent = parseInt($(this).val());
        var name = $(this).attr('name');
        if (valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
          alert('Sorry, the minimum value was reached');
          $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
          alert('Sorry, the maximum value was reached');
          $(this).val($(this).data('oldValue'));
        }
      });
      $(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== - 1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
          return;
        }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
            }
          });
    });
  </script>
    <!-- related -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#related").owlCarousel({
          itemsCustom : [
          [0, 2],
          [375, 2],
          [600, 3],
          [768, 4],
          [992, 4],
          [1200, 5],
          [1410, 6]
          ],
      // autoPlay: 1000,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : true,
      pagination:false
    });
      });
    </script>
    <!-- related over -->
    <!--slider for product-->
    <script type="text/javascript"><!--
      $('#additional').owlCarousel({
        itemsCustom : [
        [0, 3],
        [412, 4],
        [600, 6],
        [768, 3],
        [992, 4],
        [1200, 4]
        ],
        autoPlay: 1000,
        autoPlay: true,
        navigation: false,
        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        pagination: false
      });
    --></script>
    <!--over slider for product-->
  {{-- end chitiet --}}
  <script type="text/javascript">
    $("div.alert").delay(3000).slideUp();
  </script>