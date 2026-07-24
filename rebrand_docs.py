import os
import re

def replace_terms(content):
    # Replacements dictionary (ordered for priority)
    replacements = [
        (r'WordPress\.org', 'Zelocorecms'),
        (r'wordpress\.org', 'zelocorecms.com'),
        (r'WordPress', 'Zelocorecms'),
        (r'wordpress', 'zelocorecms'),
        (r'WordPress-specific', 'Zelocorecms-specific'),
        (r'WP_Query', 'Zelo_Query'),
        (r'WP_Theme', 'Zelo_Theme'),
        (r'WP_Router', 'Zelo_Router'),
        (r'\bWP\b', 'Zelo'),
        (r'\bwp-', 'zelo-'),
        (r'wp_', 'zelo_'),
        (r'Gutenberg', 'Zelocorecms Editor'),
        (r'Make WordPress', 'Make Zelocorecms'),
        # Common constants or functions
        (r'wp_head', 'zelo_head'),
        (r'wp_footer', 'zelo_footer'),
        (r'wp_body_open', 'zelo_body_open'),
        (r'wp_enqueue_style', 'zelo_enqueue_style'),
        (r'wp_enqueue_script', 'zelo_enqueue_script'),
        (r'wp_nav_menu', 'zelo_nav_menu'),
        (r'get_header', 'get_header'), # generic, ok
        (r'get_footer', 'get_footer'), # generic, ok
        # Link source lines
        (r'Source: https://developer\.wordpress\.org', 'Source: Zelocorecms Theme Documentation'),
        (r'developer\.wordpress\.org', 'docs.zelocorecms.com'),
    ]
    
    # Apply replacements
    for pattern, replacement in replacements:
        content = re.sub(pattern, replacement, content)
        
    return content

def main():
    docs_dir = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/docs/theme-development"
    files = [f for f in os.listdir(docs_dir) if f.endswith('.md')]
    
    for filename in files:
        filepath = os.path.join(docs_dir, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content = replace_terms(content)
        
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
            
    print(f"Successfully rebranded {len(files)} files.")

if __name__ == "__main__":
    main()
