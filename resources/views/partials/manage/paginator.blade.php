<?php
    if (isset($appends)) {
        if (is_array($appends)) {
            $paginator->appends($appends);
        } else {
            $paginator->appends(\Request::all());
        }
    }
?>
<div id="pagination">
    {{ $paginator->links('pagination.semanticUI') }}
</div>
