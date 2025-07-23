<?php
declare(strict_types=1);

/**
 * Handles tracks data retrieval and processing
 */
class TracksHandler
{
    private $conn;
    private const ALLOWED_SORTS = ['TrackId', 'Name', 'AlbumTitle', 'Composer'];
    private const PER_PAGE = 10;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    /**
     * Process the request and return all necessary data for the view
     */
    public function handleRequest(array $params): array
    {
        $requestData = $this->parseRequestParams($params);
        $searchParams = $this->buildSearchParams($requestData['search']);

        $total = $this->getTotalCount($searchParams);
        $totalPages = (int) ceil($total / self::PER_PAGE);
        $tracks = $this->getTracks($requestData, $searchParams);

        return [
            'search' => $requestData['search'],
            'sort' => $requestData['sort'],
            'order' => $requestData['order'],
            'page' => $requestData['page'],
            'perPage' => self::PER_PAGE,
            'offset' => $requestData['offset'],
            'total' => $total,
            'totalPages' => $totalPages,
            'tracks' => $tracks
        ];
    }

    /**
     * Parse and validate request parameters
     */
    private function parseRequestParams(array $params): array
    {
        $search = trim($params['search'] ?? '');
        $sort = in_array($params['sort'] ?? '', self::ALLOWED_SORTS)
            ? $params['sort']
            : 'TrackId';
        $order = ($params['order'] ?? 'ASC') === 'DESC' ? 'DESC' : 'ASC';
        $page = max(1, (int) ($params['page'] ?? 1));
        $offset = ($page - 1) * self::PER_PAGE;

        return compact('search', 'sort', 'order', 'page', 'offset');
    }

    /**
     * Build search parameters for database queries
     */
    private function buildSearchParams(string $search): array
    {
        if (empty($search)) {
            return [
                'condition' => '',
                'params' => [],
                'types' => ''
            ];
        }

        $pattern = "%$search%";
        return [
            'condition' => "WHERE t.Name LIKE ? OR t.TrackId LIKE ? OR a.Title LIKE ? OR t.Composer LIKE ?",
            'params' => array_fill(0, 4, $pattern),
            'types' => 'ssss'
        ];
    }

    /**
     * Get total count of tracks matching search criteria
     */
    private function getTotalCount(array $searchParams): int
    {
        $query = "SELECT COUNT(*) FROM tracks t 
                  LEFT JOIN albums a ON t.AlbumId = a.AlbumId 
                  {$searchParams['condition']}";

        $stmt = $this->conn->prepare($query);

        if (!empty($searchParams['params'])) {
            $stmt->bind_param($searchParams['types'], ...$searchParams['params']);
        }

        $stmt->execute();
        $result = $stmt->get_result()->fetch_row()[0];
        $stmt->close();

        return (int) $result;
    }

    /**
     * Get tracks data with pagination and sorting
     */
    private function getTracks(array $requestData, array $searchParams)
    {
        $orderByColumn = $requestData['sort'] === 'AlbumTitle'
            ? 'a.Title'
            : "t.{$requestData['sort']}";

        $query = "SELECT t.TrackId, t.Name, t.AlbumId, t.Composer, a.Title AS AlbumTitle
                  FROM tracks t 
                  LEFT JOIN albums a ON t.AlbumId = a.AlbumId 
                  {$searchParams['condition']} 
                  ORDER BY $orderByColumn {$requestData['order']} 
                  LIMIT ? OFFSET ?";

        $stmt = $this->conn->prepare($query);

        $params = array_merge($searchParams['params'], [self::PER_PAGE, $requestData['offset']]);
        $types = $searchParams['types'] . 'ii';

        $stmt->bind_param($types, ...$params);
        $stmt->execute();

        return $stmt->get_result();
    }
}

/**
 * Utility class for URL building and view helpers
 */
class ViewHelper
{
    /**
     * Build URL with query parameters
     */
    public static function buildUrl(array $currentParams, array $newParams = []): string
    {
        $params = array_merge([
            'search' => $currentParams['search'],
            'sort' => $currentParams['sort'],
            'order' => $currentParams['order']
        ], $newParams);

        return '?' . http_build_query($params);
    }

    /**
     * Check if current sort matches given column
     */
    public static function isCurrentSort(string $column, string $currentSort): string
    {
        return $currentSort === $column ? 'selected' : '';
    }

    /**
     * Get sort arrow for table headers
     */
    public static function getSortArrow(string $column, string $currentSort, string $currentOrder): string
    {
        if ($currentSort !== $column) {
            return '';
        }
        return $currentOrder === 'ASC' ? '↑' : '↓';
    }

    /**
     * Get next sort order for column links
     */
    public static function getNextOrder(string $column, string $currentSort, string $currentOrder): string
    {
        return ($currentSort === $column && $currentOrder === 'ASC') ? 'DESC' : 'ASC';
    }

    /**
     * Safely output HTML content
     */
    public static function escape(?string $content, string $default = ''): string
    {
        return htmlspecialchars($content ?? $default, ENT_QUOTES, 'UTF-8');
    }
}