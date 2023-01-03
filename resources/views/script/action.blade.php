<script>
    function deleteProv(id) {
        // alert(id)
        var form = document.querySelector('#deleteForm')
        form.setAttribute('action', id)
    }

    function deleteVil(id) {
        // alert(id)
        var form = document.querySelector('#FormVille')
        form.setAttribute('action', id)
    }

    function deleteZon(id) {
        // alert(id)
        var form = document.querySelector('#deleteForm')
        form.setAttribute('action', id)
    }

    function deletecommune(id) {
        // alert(id)
        var form = document.querySelector('#FormCommune')
        form.setAttribute('action', id)
    }

    function deleteOffre(id) {
        // alert(id)
        var form = document.querySelector('#FormOffre')
        form.setAttribute('action', id)
    }


    function deleteTypeActivity(id) {
        // alert(id)
        var form = document.querySelector('#FormTypeActivity')
        form.setAttribute('action', id)
    }

    function editProv(id, route) {
        // alert(id)
        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent
        document.querySelector('#editcode').value = tr.children[2].textContent
    }

    function editVille(id, route, province) {
        // alert(id)
        var prov = $('#province_id').val()

        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent
        document.querySelector('#editcode').value = tr.children[2].textContent
        $('#province_id > option').each(function() {
            var option = $(this)
            if (option.val() == province) {
                option.prop('selected', true)
            }
        })
    }

    function editZone(id, route, ville) {

        var vil = $('#ville_id').val()

        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent
        document.querySelector('#editcode').value = tr.children[2].textContent

        $('#ville_id > option').each(function() {
            var option = $(this)
            if (option.val() == ville) {
                option.prop('selected', true)
            }
        })
    }

    function editCommune(id, route, zone) {

        var zon = $('#zone_id').val()

        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent
        document.querySelector('#editcode').value = tr.children[2].textContent

        $('#zone_id > option').each(function() {
            var option = $(this)
            if (option.val() == zone) {
                option.prop('selected', true)
            }
        })
    }

    function editOffre(id, route) {
        // alert(id)
        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent
        document.querySelector('#editcode').value = tr.children[2].textContent
    }

    function editTypeActivity(id, route) {
        // alert(id)
        var form = document.querySelector('#editForm')
        form.setAttribute('action', route)
        var tr = document.querySelector('#tr' + id)
        document.querySelector('#editname').value = tr.children[1].textContent

    }
</script>
