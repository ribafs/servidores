# Release Files for Download (FRS)

## Release notes

The file browser will show any README file it finds in the current folder (or parent folder) below the file listing. This is useful to provide release notes, download instructions, etc. and it is highly recommended you make this available to your end users. README files must have "readme" in the filename (case-insensitive) and can be plain text, markdown, reStructuredText, or textile formats, using the corresponding filename extension. They are limited to 64KB in size.

Old per-file release note associations are still accessible by clicking on the "i" icon.
Known limitations

    Individual files larger than 5 GB will not replicate out to our mirrors and can not be downloaded.
    Moving files may be accomplished via the shell, but cannot be done with the web file manager.
    Note: download statistics are based on path and filename, so stats for moved files will be reset. Your total project download count will include the previous name's stats.


Files released using the File Release System (FRS) are automatically distributed to our worldwide network of download mirrors, ensuring file availability, and providing great download performance to users.

All file releases should be a single file. Multiple files for the same release should be archived together (tar, deb, zip, etc.). We recommend using rsync for all uploads over 20 megabytes in size, as rsync allows for resuming canceled or interrupted transfers.

You must be a project admin or have the "release technician" permission to manage files for a project. There are several ways to manage your files:

Allowed characters for files and directories are: -_ +.,=#~@!()[]a-zA-Z0-9 (including " " - space).
Disallowed characters are: &:%?/*$|{;^}<>\"' and unicode
Filenames may not start with a space or dot ("."), and may not end with a space (" ").


## File Manager (Web Interface)

Select Files from the Project menu. This is both the file manager (for admins) and the file browser (for visitors).

    To create a folder, click Add Folder

    To upload a file, click Add File
        click Browse, and select your file(s)
        click Upload

    Clicking on the "i" icon enables your visitors to see more information about the file, such as SHA1 and MD5 hashes, how many times the file has been downloaded, and whether or not it is the default distribution for an OS. As a project admin, you can also click this icon to edit information about the individual file.

    To change file details, click the "i" icon
    "Exclude stats" will omit this file from being counted in the download statistics
    "Default download for" controls which file is the recommended download for visitors, based on their OS. If not set for any file in the project, heuristics are used to automatically pick a recent upload with an appropriate file extension for the OS.

    "Download button" allows you to change the label on the download button seen by your visitors.

    To rename a file or folder, click the "i" icon and edit the name.
    Note: download statistics are based on file name, so stats for this file will be reset. Your total project download count will include the previous name's stats.

    To delete a file or folder, click the "-" icon
    Note: Users are responsible for backing up all of their files. SourceForge.net will not restore individual files.

## Release notes

The file browser will show any README file it finds in the current folder (or parent folder) below the file listing. This is useful to provide release notes, download instructions, etc. and it is highly recommended you make this available to your end users. README files must have "readme" in the filename (case-insensitive) and can be plain text, markdown, reStructuredText, or textile formats, using the corresponding filename extension. They are limited to 64KB in size.

Old per-file release note associations are still accessible by clicking on the "i" icon.
Known limitations

    Individual files larger than 5 GB will not replicate out to our mirrors and can not be downloaded.
    Moving files may be accomplished via the shell, but cannot be done with the web file manager.
    Note: download statistics are based on path and filename, so stats for moved files will be reset. Your total project download count will include the previous name's stats.


