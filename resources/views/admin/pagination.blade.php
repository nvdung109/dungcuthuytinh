@isset($pagination['total'])
	<div class="mt-3">Tổng số bản ghi: <b>{{ number_format($pagination['total'], 0, ',', '.') }}</b>&nbsp;</div>
@endisset


@isset($pagination['links'])
	@if($pagination['links'])
	<div class="ht-60 bd d-flex align-items-center justify-content-center mg-t-20" style="background: #FFF">
		<nav aria-label="Page navigation">
		  	<ul class="pagination pagination-basic mg-b-0">
				@php
					echo $pagination['links'];
				@endphp
			</ul>
		</nav>
	</div>
	@endif
@endisset


