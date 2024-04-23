function select(cell, date, slot) {
  // (A) UPDATE SELECTED CELL
  let last = document.querySelector("#select .selected");
  if (last != null) { last.classList.remove("selected"); }
  cell.classList.add("selected");

  // (B) UPDATE CONFIRM FORM
  let id = document.getElementById("cid").value;
  let sname = document.getElementById("csname").value;
  let semail = document.getElementById("csemail").value;
  let fname = document.getElementById("cfname").value;
  let section = document.getElementById("csection").value;

  document.getElementById("cdate").value = date;
  document.getElementById("cslot").value = slot;
  document.getElementById("cgo").disabled = false;
}
