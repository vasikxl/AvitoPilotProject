@if($state == "new") {{ "badge-primary" }}
@elseif($state == "processing") {{ "badge-info" }}
@elseif($state == "done") {{ "badge-success" }}
@else {{ "badge-danger" }}
@endif
