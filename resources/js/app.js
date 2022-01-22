require("./bootstrap");

function dataTableController(id) {
    return {
        id,
        deleteItem() {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Silahkan hapus!"
            }).then(result => {
                if (result.isConfirmed) {
                    Livewire.emit("softDelete", this.id);
                }
            });
        }
    };
}

function dataTableMainController() {
    return {
        setCallback() {
            Livewire.on("deleteResult", result => {
                if (result.status) {
                    Swal.fire("Deleted!", result.message, "success");
                } else {
                    Swal.fire("Error!", result.message, "error");
                }
            });
        }
    };
}

window.__controller = {
    dataTableController,
    dataTableMainController
};
