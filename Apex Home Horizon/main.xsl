<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <head>
        <title>Staff Information</title>
        <style>
          table {
            border-collapse: collapse;
            width: 100%;
          }
          th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
          }
          th {
            background-color: #f2f2f2;
          }
        </style>
      </head>
      <body>
        <h2>Staff Information</h2>
        <table>
          <tr>
            <th>Staff ID</th>
            <th>Staff Type</th>
            <th>Full Name</th>
            <th>Contact Information</th>
            <th>Schedule Details</th>
            <th>Responsibilities</th>
            <th>Training History</th>
            <th>Performance Reviews</th>
            <th>Active Projects</th>
            <th>Historical Maintenance Requests</th>
          </tr>
          <xsl:apply-templates select="staffInformation/staffDetails"/>
        </table>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="staffDetails">
    <tr>
      <td><xsl:value-of select="staffId"/></td>
      <td><xsl:value-of select="staffType"/></td>
      <td><xsl:value-of select="fullName"/></td>
      <td>
        <xsl:value-of select="contactInformation/phoneNumber"/><br/>
        <xsl:value-of select="contactInformation/email"/>
      </td>
      <td>
        <xsl:value-of select="scheduleDetails/workingHours"/> hours<br/>
        Shift: <xsl:value-of select="scheduleDetails/shift"/>
      </td>
      <td>
        Role: <xsl:value-of select="responsibilities/role"/><br/>
        Team: <xsl:value-of select="responsibilities/team"/>
      </td>
      <td>
        <ul>
          <xsl:for-each select="trainingHistory/training">
            <li><xsl:value-of select="concat(course, ' - ', completionDate)"/></li>
          </xsl:for-each>
        </ul>
      </td>
      <td>
        <ul>
          <xsl:for-each select="performanceReviews/review">
            <li><xsl:value-of select="concat(year, ': ', rating)"/></li>
          </xsl:for-each>
        </ul>
      </td>
      <td>
        <ul>
          <xsl:for-each select="activeProjects/project">
            <li><xsl:value-of select="concat(projectName, ' (Manager: ', projectManager, ')')"/></li>
          </xsl:for-each>
        </ul>
      </td>
      <td>
        <ul>
          <xsl:for-each select="historicalMaintenanceRequests/request">
            <li><xsl:value-of select="concat(requestId, ' - ', date, ': ', description)"/></li>
          </xsl:for-each>
        </ul>
      </td>
    </tr>
  </xsl:template>

</xsl:stylesheet>
