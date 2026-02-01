# Contributing to RentFlow Pro

First off, thank you for considering contributing to RentFlow Pro! It's people like you that make RentFlow Pro such a great tool.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [How Can I Contribute?](#how-can-i-contribute)
- [Development Workflow](#development-workflow)
- [Style Guidelines](#style-guidelines)
- [Commit Messages](#commit-messages)
- [Pull Request Process](#pull-request-process)

## Code of Conduct

This project and everyone participating in it is governed by a code of conduct. By participating, you are expected to uphold this code. Please report unacceptable behavior to the project maintainers.

### Our Standards

- Using welcoming and inclusive language
- Being respectful of differing viewpoints and experiences
- Gracefully accepting constructive criticism
- Focusing on what is best for the community
- Showing empathy towards other community members

## Getting Started

### Prerequisites

Before you begin, ensure you have:

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL 8.0 or higher
- Git
- A GitHub account

### Setting Up Your Development Environment

1. **Fork the Repository**

   Click the "Fork" button at the top right of the repository page.

2. **Clone Your Fork**
   ```bash
   git clone https://github.com/your-username/rentflow-pro.git
   cd rentflow-pro
   ```

3. **Add Upstream Remote**
   ```bash
   git remote add upstream https://github.com/original-owner/rentflow-pro.git
   ```

4. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

5. **Set Up Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

6. **Configure Database**

   Edit `.env` file with your local database credentials and run:
   ```bash
   php artisan migrate
   ```

7. **Build Assets**
   ```bash
   npm run dev
   ```

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the existing issues to avoid duplicates. When you create a bug report, include as many details as possible:

**Bug Report Template:**

```markdown
**Describe the bug**
A clear and concise description of what the bug is.

**To Reproduce**
Steps to reproduce the behavior:
1. Go to '...'
2. Click on '....'
3. Scroll down to '....'
4. See error

**Expected behavior**
A clear and concise description of what you expected to happen.

**Screenshots**
If applicable, add screenshots to help explain your problem.

**Environment:**
 - OS: [e.g. Windows 11]
 - PHP Version: [e.g. 8.2.0]
 - Laravel Version: [e.g. 11.0]
 - Browser: [e.g. Chrome, Firefox]

**Additional context**
Add any other context about the problem here.
```

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion, include:

- **Clear and descriptive title**
- **Detailed description** of the suggested enhancement
- **Use cases** - explain why this would be useful
- **Possible implementation** - if you have ideas on how to implement

### Your First Code Contribution

Unsure where to begin? Look for issues labeled:

- `good first issue` - Simple issues perfect for newcomers
- `help wanted` - Issues that need assistance
- `bug` - Something that needs fixing
- `enhancement` - New features or improvements

### Pull Requests

1. **Create a Branch**
   ```bash
   git checkout -b feature/your-feature-name
   # or
   git checkout -b bugfix/issue-description
   ```

2. **Make Your Changes**

   Follow the style guidelines and ensure your code is well-documented.

3. **Test Your Changes**
   ```bash
   php artisan test
   ```

4. **Commit Your Changes**

   Follow the commit message guidelines below.

5. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

6. **Open a Pull Request**

   Go to the original repository and click "New Pull Request"

## Development Workflow

### Branch Naming Convention

- **Feature branches**: `feature/description-of-feature`
- **Bug fix branches**: `bugfix/description-of-fix`
- **Hotfix branches**: `hotfix/critical-fix`
- **Documentation**: `docs/what-you-are-documenting`

Examples:
- `feature/add-email-notifications`
- `bugfix/fix-collection-calculation`
- `docs/update-installation-guide`

### Keep Your Fork Updated

```bash
git fetch upstream
git checkout main
git merge upstream/main
git push origin main
```

## Style Guidelines

### PHP Code Style

We follow the PSR-12 coding standard. Use Laravel Pint to format your code:

```bash
./vendor/bin/pint
```

**Key points:**
- Use 4 spaces for indentation
- Follow PSR-12 naming conventions
- Add type hints where possible
- Write clear, self-documenting code
- Add comments for complex logic

### JavaScript Code Style

- Use ES6+ syntax
- Use 2 spaces for indentation
- Use meaningful variable names
- Add comments for complex logic

### Blade Templates

- Use proper indentation
- Keep logic minimal in views
- Use components for reusable elements

### Database Guidelines

- **Migrations**: Always create migrations for database changes
- **Models**: Define relationships explicitly
- **Foreign Keys**: Always use foreign key constraints
- **Indexes**: Add indexes for frequently queried columns

### Testing

- Write unit tests for business logic
- Write feature tests for user-facing features
- Aim for high code coverage
- Run tests before submitting PR:
  ```bash
  php artisan test
  ```

## Commit Messages

### Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- **feat**: A new feature
- **fix**: A bug fix
- **docs**: Documentation only changes
- **style**: Changes that don't affect code meaning (formatting, etc.)
- **refactor**: Code change that neither fixes a bug nor adds a feature
- **perf**: Performance improvements
- **test**: Adding or updating tests
- **chore**: Changes to build process or auxiliary tools

### Examples

```
feat(booking): add email notification for booking confirmation

Implement email notification system that sends confirmation
emails to customers when their booking is approved.

Closes #123
```

```
fix(collection): correct due amount calculation

Due amount was not calculating correctly when partial
payments were made. Fixed the calculation logic in
CollectionController.

Fixes #456
```

### Guidelines

- Use present tense ("add feature" not "added feature")
- Use imperative mood ("move cursor to..." not "moves cursor to...")
- Capitalize first letter
- No period at the end of subject line
- Limit subject line to 50 characters
- Wrap body at 72 characters
- Reference issues and pull requests in footer

## Pull Request Process

### Before Submitting

- [ ] Code follows project style guidelines
- [ ] Self-review of your code
- [ ] Comments added for complex code
- [ ] Documentation updated if needed
- [ ] No new warnings or errors
- [ ] Tests added/updated and passing
- [ ] Migrations tested (if applicable)

### PR Template

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix (non-breaking change which fixes an issue)
- [ ] New feature (non-breaking change which adds functionality)
- [ ] Breaking change (fix or feature that would cause existing functionality to not work as expected)
- [ ] Documentation update

## Related Issue
Fixes #(issue number)

## How Has This Been Tested?
Describe the tests you ran

## Screenshots (if applicable)
Add screenshots here

## Checklist
- [ ] My code follows the style guidelines
- [ ] I have performed a self-review
- [ ] I have commented my code where necessary
- [ ] I have updated the documentation
- [ ] My changes generate no new warnings
- [ ] I have added tests that prove my fix is effective
- [ ] New and existing unit tests pass locally
```

### Review Process

1. **Automated Checks**: CI/CD pipeline will run automated tests
2. **Code Review**: At least one maintainer will review your code
3. **Feedback**: Address any requested changes
4. **Approval**: Once approved, a maintainer will merge your PR

### After Your PR is Merged

1. Delete your branch (optional)
2. Update your local repository
   ```bash
   git checkout main
   git pull upstream main
   ```
3. Celebrate! 🎉 You've contributed to RentFlow Pro!

## Documentation

When adding new features:

1. Update relevant documentation in README.md
2. Add code comments for complex logic
3. Update API documentation if adding/changing routes
4. Consider adding examples

## Questions?

Feel free to:

- Open an issue with the `question` label
- Contact the maintainers
- Join our community discussions

## Recognition

Contributors will be recognized in:
- README.md contributors section
- GitHub contributors graph
- Release notes for significant contributions

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

---

Thank you for contributing to RentFlow Pro! 🙏
