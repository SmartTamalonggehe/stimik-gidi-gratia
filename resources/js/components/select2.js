// function tomSelect export default

export default function select2() {
    try {
        $(".select-basic").select2({
            tags: true,
            dropdownParent: $(".tampilModal"),
        });
    } catch (e) {}
}
select2();
