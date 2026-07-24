import os
import re

def modify_metadata(content):
    # Replace author
    content = re.sub(r'(?i)^Author: .*$', 'Author: P.J.Borgohain', content, flags=re.MULTILINE)
    
    # Replace dates
    current_date = 'July 24, 2026'
    content = re.sub(r'(?i)^Published: .*$', f'Published: {current_date}', content, flags=re.MULTILINE)
    content = re.sub(r'(?i)^Last modified: .*$', f'Last modified: {current_date}', content, flags=re.MULTILINE)
    
    # Remove text-based date sections that appear in the body
    content = re.sub(r'(?i)First published\s*\n\s*[A-Za-z]+ \d{1,2}, \d{4}\s*', '', content)
    content = re.sub(r'(?i)Last updated\s*\n\s*[A-Za-z]+ \d{1,2}, \d{4}\s*', '', content)
    
    # Remove other typical credits lines if they exist (example: "written by ...")
    content = re.sub(r'(?i)written by .*?\.', '', content)
    
    return content

def main():
    docs_dir = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/docs/theme-development"
    files = [f for f in os.listdir(docs_dir) if f.endswith('.md')]
    
    for filename in files:
        filepath = os.path.join(docs_dir, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content = modify_metadata(content)
        
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
            
    print(f"Successfully updated metadata in {len(files)} files.")

if __name__ == "__main__":
    main()
