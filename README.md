# PageAvatar plugin for Cotonti Siena

Plugin for [CMF Cotonti Siena](https://www.cotonti.com) used to associate pages with any types of files and manage such links.

Authors: Authors: [esclkm](https://www.cotonti.com/users/esclkm), [Kort](https://www.cotonti.com/users/Kort),  Cotonti Team \
Plugin page: https://www.cotonti.com/extensions/files-media/pageavatar-siena

## Installation

- Unpack upload and install Pageavatar plugin
- Add code snippets to page.add.tpl and page.edit.tpl (or category-specific templates)
- Add settings strings for each specific category (see below)
- Create folder(s) for file uploads as needed


**Page.add.tpl:**

Add plugin tags as follows:
```
<tr>
  <td>{PAGEADD_FORM_AVATAR_TITLE}:</td>
  <td>{PAGEADD_FORM_AVATAR}</td>
</tr>
```


**Page.edit.tpl:**

Add plugin tags as follows:
```
<tr>
  <td>{PAGEEDIT_FORM_AVATAR_TITLE}:</td>
  <td>
  {PAGEEDIT_FORM_AVATAR}
  <!-- IF {PAGEEDIT_FORM_AVATARFILE} -->
  <p>{PHP.L.Uploaded}: {PAGEEDIT_FORM_AVATARFILE}<br /> {PHP.L.Delete}: {PAGEEDIT_FORM_AVATARDELETE}</p>
  <!-- ENDIF -->
  </td>
</tr>
```
The structure of a settings string is as follows:

    category code | path to uploads folder | thumbnail mask(s) | mandatory? | extension(s) | thumb creation mode



Brief explanation:

- category code is... the category code (you can use 'all' to deal with all uploads)
- path is the path to the folder you want to store the files in (we recommend ./datas/smth/)
- thumbnail mask is best explained with an example: thumb_150-200 (add thumb_ prefix to the filename, height 150, width 200)
- if you want to specify mandatory upload add 1 here, otherwise 0 (optional)
- specify extensions you want to restrict uploads with (optional)
- this is the way you want thumb to be generated: crop is crop, height gives you height priority, width -- width priority, frame means the thumb will stay within the specified height and width



You can now get your image paths in the LIST_ROW regular block or elsewhere, i.e.:

- ./datas/{LIST_ROW_CAT}/{LIST_ROW_AVATAR} will give you ./datas/shop/page_234.jpg
- thumb_{LIST_ROW_AVATAR} will give you thumb_page_234.jpg

