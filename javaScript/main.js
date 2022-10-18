let id = $("input[name*='course_id']");
id.attr("readonly", "readonly");
$(".btnedit").click((e) => {
  let textvalues = displayData(e);

  let bookname = $("input[name*='course_name']");
  let bookpublisher = $("input[name*='author_name']");
  let bookprice = $("input[name*='course_price']");

  id.val(textvalues[0]);
  bookname.val(textvalues[1]);
  bookpublisher.val(textvalues[2]);
  bookprice.val(textvalues[3].replace("$", ""));
});

function displayData(e) {
  let id = 0;
  const td = $("#tbody tr td");
  let textvalues = [];

  for (const value of td) {
    if (value.dataset.id == e.target.dataset.id) {
      textvalues[id++] = value.textContent;
    }
  }
  return textvalues;
}
