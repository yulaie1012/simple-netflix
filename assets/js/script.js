function toggleVolume(button) {
  const muted = $(".preview-video").prop("muted");
  $(".preview-video").prop("muted", !muted);
}
