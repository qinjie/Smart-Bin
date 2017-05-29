__author__ = 'zqi2'

import ConfigParser

import requests
from requests.auth import HTTPBasicAuth

from entity import Entity


class NodeData(Entity):
    # config section
    _config_section = 'node-data'

    def __init__(self):
        Entity.__init__(self)

        parser = ConfigParser.SafeConfigParser()
        parser.read(self._config_file)
        self._urls['latest_by_project'] = self._base_url + parser.get(self._config_section, 'latest_by_project')
        self._urls['latest_by_project_and_label'] = self._base_url + parser.get(self._config_section,
                                                                                'latest_by_project_and_label')
        self._urls['latest_all_labels_by_project'] = self._base_url + parser.get(self._config_section,
                                                                                 'latest_all_labels_by_project')
        self._urls['latest_all_labels_in_days_by_project'] = self._base_url + parser.get(self._config_section,
                                                                                         'latest_all_labels_in_days_by_project')

    def latest_by_project(self, projectId, auth=None):
        url = self._urls['latest_by_project'].replace("<projectId>", str(projectId))
        headers = {'Accept': 'application/json'}
        r = requests.get(url, auth=auth, headers=headers)
        self.log.info("LATEST_BY_PROJECT: %s", url)
        self.log.info("%s %s", r.status_code, r.headers['content-type'])
        self.log.info(r.text)
        return r

    def latest_by_project_and_label(self, projectId, label, auth=None):
        url = self._urls['latest_by_project_and_label'].replace("<projectId>", str(projectId))
        url = url.replace("<label>", str(label))
        headers = {'Accept': 'application/json'}
        r = requests.get(url, auth=auth, headers=headers)
        self.log.info("LATEST_BY_PROJECT_AND_LABEL: %s", url)
        self.log.info("%s %s", r.status_code, r.headers['content-type'])
        self.log.info(r.text)
        return r

    def latest_all_labels_by_project(self, projectId, auth=None):
        url = self._urls['latest_all_labels_by_project'].replace("<projectId>", str(projectId))
        headers = {'Accept': 'application/json'}
        r = requests.get(url, auth=auth, headers=headers)
        self.log.info("LATEST_ALL_LABELS_BY_PROJECT: %s", url)
        self.log.info("%s %s", r.status_code, r.headers['content-type'])
        self.log.info(r.text)
        return r

    def latest_all_labels_in_days_by_project(self, projectId, pastDays, auth=None):
        url = self._urls['latest_all_labels_in_days_by_project'].replace("<projectId>", str(projectId))
        url = url.replace("<pastDays>", str(pastDays))
        headers = {'Accept': 'application/json'}
        r = requests.get(url, auth=auth, headers=headers)
        self.log.info("LATEST_ALL_LABELS_IN_DAYS_BY_PROJECT: %s", url)
        self.log.info("%s %s", r.status_code, r.headers['content-type'])
        self.log.info(r.text)
        return r


if __name__ == '__main__':

    # # Read options from command line
    # argParser = argparse.ArgumentParser('API Entity')
    # argParser.add_argument('-c', '--configFile', help="Configuration file", required=False)
    # argParser.add_argument('-s', '--configSession', help="Configuration session", required=False)
    # argParser.add_argument('-u', '--username', help="Username", required=False)
    # argParser.add_argument('-p', '--password', help="Password", required=False)
    # args = argParser.parse_args()

    # Username and Password for Authentication
    username = 'user1'
    password = '123456'
    auth = HTTPBasicAuth(username, password)

    entity = NodeData()

    # LIST
    entity.list(auth)

    # VIEW
    entity.view(4)

    # SEARCH
    entity.search('label=temp', auth)

    # LATEST_BY_PROJECT
    entity.latest_by_project(projectId=1, auth=auth)

    # LATEST_BY_PROJECT_AND_LABEL
    label = "Temp"
    entity.latest_by_project_and_label(projectId=1, label=label, auth=auth)

    # LATEST_ALL_LABELS_BY_PROJECT
    entity.latest_all_labels_by_project(projectId=1, auth=auth)

    # LATEST_ALL_LABELS_IN_DAYS_BY_PROJECT
    days = "30"
    entity.latest_all_labels_in_days_by_project(projectId=1, pastDays=30, auth=auth)

    # CREATE
    data1 = {'node_id': '1', 'label': 'temp', 'value': '8.88'}
    r1 = entity.create(data1, auth)

    if r1.status_code == 201:
        # UPDATE
        obj = r1.json()
        obj['label'] = 'temp1'
        obj['value'] = '44.44'
        r1_2 = entity.update(obj, auth)

        # DELETE
        rd1 = entity.delete(obj['id'], auth)
