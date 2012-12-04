<% if HasFlashModule %>
<% include FlashObject %>
<% else %>
<% if IFrameObjectData %><% control IFrameObjectData %>
<iframe width="$Width" height="$Height" src="http://www.youtube.com/embed/$Code" frameborder="0"></iframe>
<% end_control %><% end_if %>
<% end_if %>
