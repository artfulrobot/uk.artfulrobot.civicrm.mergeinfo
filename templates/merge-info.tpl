<p id="xx">main: '{$main_contact_subtype}'</p>
<p >other: '{$other_contact_subtype}'</p>
{if $other_contact_subtype && $main_contact_subtype != $other_contact_subtype}
  <script>
  CRM.$(function() {ldelim}
    CRM.alert("{ts}The record that would be deleted by this merge is of type '{$other_contact_subtype}'. Any custom data to do with that will be lost in the merge. Consider using the \"flip between original and duplicate contacts\" button{/ts}", '{ts}Risk of data loss{/ts}', 'warn', {ldelim}expires:0{rdelim});
  {rdelim});
  </script>
{/if}
