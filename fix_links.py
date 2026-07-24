import os
import re
from urllib.parse import urlparse

def get_slug_from_filename(filename):
    # e.g., 135-list-of-conditional-tags.md -> list-of-conditional-tags
    base = os.path.splitext(filename)[0]
    parts = base.split('-', 1)
    if len(parts) > 1 and parts[0].isdigit():
        return parts[1]
    return base

def main():
    docs_dir = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/docs/theme-development"
    files = [f for f in os.listdir(docs_dir) if f.endswith('.md')]
    
    # Build slug to filename map
    slug_map = {}
    for f in files:
        slug = get_slug_from_filename(f)
        slug_map[slug] = f
        
    def replace_link(match):
        url = match.group(1)
        # Check if it's a theme URL
        if url.startswith('https://developer.zelocorecms.com/themes/') or url.startswith('http://developer.zelocorecms.com/themes/'):
            parsed = urlparse(url)
            path = parsed.path
            # extract slug
            parts = [p for p in path.split('/') if p]
            
            slug = ""
            if parts and parts[0] == "themes":
                if len(parts) > 1:
                    slug = parts[-1]
                else:
                    slug = "themes" # Root of themes
            
            # If there's a match in our files
            if slug in slug_map:
                new_url = slug_map[slug]
            else:
                # If we couldn't find an exact match, try matching just the end
                found = False
                for k, v in slug_map.items():
                    if k == slug:
                        new_url = v
                        found = True
                        break
                if not found:
                    return match.group(0) # don't replace if not found
            
            # Add fragment and query if they exist?
            # Usually we keep fragments for local markdown links
            if parsed.query and "output_format=md" not in parsed.query:
                # If there are important queries, maybe keep them? But mostly it's just the anchor
                pass 
                
            if parsed.fragment:
                new_url += "#" + parsed.fragment
                
            return f"({new_url})"
        return match.group(0)

    # Regex to find markdown links: [text](url)
    link_pattern = re.compile(r'\((https?://developer\.zelocorecms\.com/themes/[^)]*)\)')

    updated_count = 0
    for filename in files:
        filepath = os.path.join(docs_dir, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content, count = link_pattern.subn(replace_link, content)
        
        if count > 0:
            updated_count += 1
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
                
    print(f"Updated links in {updated_count} files.")

if __name__ == "__main__":
    main()
