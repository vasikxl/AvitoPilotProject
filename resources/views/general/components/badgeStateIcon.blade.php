@if($state == "new") {{ "fa-file-lines" }}
@elseif($state == "processing") {{ "fa-gear" }}
@elseif($state == "done") {{ "fa-check" }}
@else {{ "fa-xmark" }}
@endif
