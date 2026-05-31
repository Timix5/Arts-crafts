<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Nika Verdnik Art</title>
</head>
<body>
<script>
const savedLang = localStorage.getItem("lang");

if (savedLang) {
  location.href = "/" + savedLang + "/";
} else {
  const lang = navigator.language;
  if (lang.startsWith("sl")) {
    location.href = "/sl/";
  } else {
    location.href = "/en/";
  }
}
</script>
</body>
</html>